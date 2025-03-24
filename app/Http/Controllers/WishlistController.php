<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('wishlist.title');
        $viewData['subtitle'] = __('wishlist.subtitle');
        $viewData['items'] = Item::whereNotNull('wishlist_id')->get();

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function remove(int $id): RedirectResponse
    {
        $item = Item::where('wishlist_id', '!=', null)->findOrFail($id);
        $item->delete();

        return redirect()->route('wishlist.index')->with('success', __('wishlist.item_removed'));
    }
}
