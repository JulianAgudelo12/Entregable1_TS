<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['sub_total'] - float - contains the subtotal price of the item
     * $this->attributes['quantity'] - int - contains the quantity of this item in an order or wishlist
     * $this->attributes['order_id'] - int|null - contains the related order id (if exists)
     * $this->attributes['wishlist_id'] - int|null - contains the related wishlist id (if exists)
     * $this->attributes['computer_id'] - int|null - contains the related computer id (if exists)
     * $this->attributes['component_id'] - int|null - contains the related component id (if exists)
     * $this->attributes['created_at'] - timestamp - contains the item created date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getSubTotal(): float
    {
        return (float) $this->attributes['sub_total'];
    }

    public function setSubTotal(float $subTotal): void
    {
        $this->attributes['sub_total'] = $subTotal;
    }

    public function getQuantity(): int
    {
        return (int) $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getOrderId(): ?int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(?int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getWishlistId(): ?int
    {
        return $this->attributes['wishlist_id'];
    }

    public function setWishlistId(?int $wishlistId): void
    {
        $this->attributes['wishlist_id'] = $wishlistId;
    }

    public function getComputerId(): ?int
    {
        return $this->attributes['computer_id'];
    }

    public function setComputerId(?int $computerId): void
    {
        $this->attributes['computer_id'] = $computerId;
    }

    public function getComponentId(): ?int
    {
        return $this->attributes['component_id'];
    }

    public function setComponentId(?int $componentId): void
    {
        $this->attributes['component_id'] = $componentId;
    }

    public function getCreatedAt(): Carbon
    {
        return Carbon::parse($this->attributes['created_at']);
    }

    public function getUpdatedAt(): Carbon
    {
        return Carbon::parse($this->attributes['updated_at']);
    }
}
