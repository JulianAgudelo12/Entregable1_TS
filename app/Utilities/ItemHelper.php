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

    public static function addOrUpdateItemToOrder($order, array $data): Item
    {
        $item = Item::where('order_id', $order->getId())
            ->where('computer_id', $data['computer_id'])
            ->where('component_id', $data['component_id'])
            ->first();

        if ($item) {
            $item->setQuantity($item->getQuantity() + $data['quantity']);
            $item->setSubTotal($item->getSubTotal() + $data['sub_total']);
        } else {
            $item = new Item;
            $item->setOrderId($order->getId());
            $item->setQuantity($data['quantity']);
            $item->setSubTotal($data['sub_total']);
            $item->setComputerId($data['computer_id']);
            $item->setComponentId($data['component_id']);
        }

        $item->save();

        return $item;
    }

    public static function updateQuantity(int $itemId, int $requestedQuantity): Item
    {
        $item = Item::findOrFail($itemId);
        $order = $item->order;

        $newQuantity = max(1, $requestedQuantity);
        $unitPrice = $item->getSubTotal() / $item->getQuantity();

        $oldSubtotal = $item->getSubTotal();
        $newSubtotal = $unitPrice * $newQuantity;

        $item->setQuantity($newQuantity);
        $item->setSubTotal($newSubtotal);
        $item->save();

        $order->setPrice($order->getPrice() - $oldSubtotal + $newSubtotal);
        $order->save();

        return $item;
    }
}
