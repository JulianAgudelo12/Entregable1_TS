<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Utilities;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemHelper
{
    public static function fillItemData(Item $item, Request $request): void
    {
        $item->setSubTotal($request->input('sub_total'));
        $item->setQuantity($request->input('quantity'));
        $item->setOrderId($request->input('order_id'));
        $item->setWishlistId($request->input('wishlist_id'));
        $item->setComputerId($request->input('computer_id'));
        $item->setComponentId($request->input('component_id'));
    }
}
