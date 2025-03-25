<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Item;
use App\Models\Wishlist;
use App\Utilities\ItemHelper;
use App\Utilities\ItemValidator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        if (! auth()->check()) {
            return redirect()->back()->with('error', __('auth.login_required'));
        }

        $computer = Computer::findOrFail($request->input('computer_id'));
        $quantity = $request->has('wishlist_id') ? 1 : $request->input('quantity');
        $subTotal = $computer->getPrice() * $quantity;

        $request->merge(['sub_total' => $subTotal]);

        $validatedData = ItemValidator::validate($request->all());

        $wishlistId = null;

        if ($request->has('wishlist_id')) {
            $wishlist = Wishlist::where('user_id', auth()->id())->first();

            if (! $wishlist) {
                $wishlist = new Wishlist;
                $wishlist->setUserId(auth()->id());
                $wishlist->setName('Default Wishlist');
                $wishlist->save();
            }

            $wishlistId = $wishlist->getId();
        }

        $item = new Item;
        $item->setQuantity($quantity);
        $item->setComputerId($computer->getId());
        $item->setSubTotal($subTotal);

        if ($wishlistId) {
            $item->setWishlistId($wishlistId);
        } elseif ($request->has('order_id')) {
            $item->setOrderId($validatedData['order_id']);
        }

        $item->save();

        return $wishlistId
            ? redirect()->route('wishlist.index')->with('success', __('wishlist.item_added'))
            : redirect()->route('orders.index')->with('success', __('order.item_added'));
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
}
