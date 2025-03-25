<?php

/* Developed by Julian Agudelo Cifuentes */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['price'] - float - contains the total price of the order
     * $this->attributes['state'] - string - contains the current state of the order
     * $this->attributes['payment_method'] - string - contains the payment method of the order
     * $this->attributes['user_id'] - int - contains the ID of the user that owns the order
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the last update date of the order
     */
    protected $fillable = ['price', 'state', 'payment_method', 'user_id'];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    // Setters & Getters

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setState(string $state): void
    {
        $this->attributes['state'] = $state;
    }

    public function getState(): string
    {
        return $this->attributes['state'];
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->attributes['payment_method'] = $paymentMethod;
    }

    public function getPaymentMethod(): string
    {
        return $this->attributes['payment_method'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
