<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Item;
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
        $viewData['title'] = __('Item List');
        $viewData['items'] = Item::all();

        return view('item.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('Create Item');

        return view('item.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        $computer = Computer::findOrFail($request->input('computer_id'));
        $quantity = $request->has('wishlist_id') ? 1 : $request->input('quantity');
        $subTotal = $computer->getPrice() * $quantity;

        $validatedData = ItemValidator::validate(array_merge($request->all(), ['sub_total' => $subTotal]));

        $item = new Item;
        $item->setQuantity($quantity);
        $item->setComputerId($computer->getId());
        $item->setSubTotal($subTotal);

        if ($request->has('wishlist_id')) {
            $item->setWishlistId($validatedData['wishlist_id']);
            $item->save();

            return redirect()->route('wishlist.index')->with('success', 'Item added to wishlist!');
        } elseif ($request->has('order_id')) {
            $item->setOrderId($validatedData['order_id']);
            $item->save();

            return redirect()->route('orders.index')->with('success', 'Item added to order!');
        }

        return back()->with('error', 'No destination selected.');
    }

    public function show(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('Item Details');
        $viewData['item'] = Item::findOrFail($id);

        return view('item.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('Edit Item');
        $viewData['item'] = Item::findOrFail($id);

        return view('item.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = ItemValidator::validate($request->all());

        $item = Item::findOrFail($id);
        ItemHelper::fillItemData($item, new Request($validatedData));
        $item->save();

        return redirect()->route('items.index')->with('success', __('Item updated successfully!'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', __('Item deleted successfully!'));
    }
}
