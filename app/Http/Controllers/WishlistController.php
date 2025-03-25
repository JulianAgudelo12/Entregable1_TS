<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Item;
use App\Models\Wishlist;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WishlistController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $user = auth()->user();

        $wishlist = Wishlist::firstOrCreate(
            ['user_id' => $user->getId()],
            ['name' => __('wishlist.default_name')]
        );

        $viewData['title'] = __('wishlist.title');
        $viewData['subtitle'] = __('wishlist.subtitle');
        $viewData['items'] = Item::where('wishlist_id', $wishlist->getId())->get();

        foreach ($viewData['items'] as $item) {
            $item->computerData = Computer::find($item->getComputerId());
        }

        return view('wishlist.index')->with('viewData', $viewData);
    }

    public function remove(int $id): RedirectResponse
    {
        $wishlistId = Wishlist::where('user_id', auth()->id())->value('id');

        $item = Item::where('wishlist_id', $wishlistId)->findOrFail($id);
        $item->delete();

        return redirect()->route('wishlist.index')->with('success', __('wishlist.item_removed'));
    }
}
