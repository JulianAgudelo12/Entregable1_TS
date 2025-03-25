<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Computer;
use App\Models\Item;
use App\Models\Wishlist;
use App\Utilities\ItemHelper;
use App\Utilities\ItemValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('items.title');
        $viewData['items'] = Item::all();

        return view('item.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('items.create');

        return view('item.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        if (! Auth::check()) {
            return redirect()->back()->with('error', __('auth.login_required'));
        }

        $user = Auth::user();
        $quantity = $request->input('quantity', 1);

        // Handle wishlist item
        if ($request->has('wishlist')) {
            $wishlist = Wishlist::firstOrCreate(
                ['user_id' => $user->getId()],
                ['name' => __('wishlist.default_name')]
            );

            $item = new Item;
            $item->setQuantity($quantity);
            $item->setWishlistId($wishlist->getId());

            if ($request->has('computer_id')) {
                $computer = Computer::findOrFail($request->input('computer_id'));
                $item->setComputerId($computer->getId());
                $item->setSubTotal($computer->getPrice() * $quantity);
            } elseif ($request->has('component_id')) {
                $component = Component::findOrFail($request->input('component_id'));
                $item->setComponentId($component->getId());
                $item->setSubTotal($component->getPrice() * $quantity);
            }

            $item->save();

            return redirect()->route('wishlist.index')->with('success', __('wishlist.item_added'));
        }

        // Handle order item
        $order = $user->order;
        if (! $order) {
            return redirect()->route('order.create')->with('error', __('order.not_found'));
        }

        $subTotal = 0;
        if ($request->has('computer_id')) {
            $computer = Computer::findOrFail($request->input('computer_id'));
            $subTotal = $computer->getPrice() * $quantity;
        } elseif ($request->has('component_id')) {
            $component = Component::findOrFail($request->input('component_id'));
            $subTotal = $component->getPrice() * $quantity;
        }

        $request->merge([
            'sub_total' => $subTotal,
            'order_id' => $order->getId(),
        ]);

        $validatedData = ItemValidator::validate($request->all());

        $item = ItemHelper::addOrUpdateItemToOrder($order, [
            'computer_id' => $request->input('computer_id'),
            'component_id' => $request->input('component_id'),
            'quantity' => $quantity,
            'sub_total' => $subTotal,
        ]);

        $order->setPrice($order->getPrice() + $subTotal);
        $order->save();

        return redirect()->route('order.show', $order->getId())->with('success', __('order.item_added'));
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('items.details');
        $viewData['item'] = Item::findOrFail($id);

        return view('item.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('items.edit');
        $viewData['item'] = Item::findOrFail($id);

        return view('item.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = ItemValidator::validate($request->all());

        $item = Item::findOrFail($id);
        ItemHelper::fillItemData($item, new Request($validatedData));
        $item->save();

        return redirect()->route('items.index')->with('success', __('items.updated'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', __('items.deleted'));
    }

    public function removeFromOrder(int $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $order = $item->order;

        if ($order) {
            $order->setPrice($order->getPrice() - $item->getSubTotal());
            $order->save();
        }

        $item->delete();

        return redirect()->route('order.show', $order->getId())->with('success', __('order.item_removed'));
    }

    public function updateQuantity(Request $request, int $id): RedirectResponse
    {
        $item = ItemHelper::updateQuantity($id, (int) $request->input('quantity'));

        return redirect()->route('order.show', $item->order->getId())->with('success', __('order.quantity_updated'));
    }
}
