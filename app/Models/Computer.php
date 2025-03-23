<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Computer extends Model
{
    /**
     * COMPUTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the computer primary key (id)
     * $this->attributes['reference'] - string - contains the computer's reference number
     * $this->attributes['name'] - string - contains the computer's name
     * $this->attributes['brand'] - string - contains the computer's brand
     * $this->attributes['quantity'] - int - contains the amount of computers of this refeence in storage
     * $this->attributes['type'] - string - contains the type of computer (desktop/laptop)
     * $this->attributes['description'] - string - contains general information about the computer
     * $this->attributes['price'] - string - contains the computer's price
     * $this->attributes['created_at'] - timestamp - contains the computer created date
     * $this->attributes['updated_at'] - timestamp - contains the computer update date
     */
    public static function validate($request)
    {
        $request->validate([
            'reference' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required|numeric|gte:0',
            'type' => 'required|in:desktop,laptop',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getReference(): string
    {
        return $this->attributes['reference'];
    }

    public function setReference(string $reference): void
    {
        $this->attributes['reference'] = $reference;
    }

    public function getName(): string
    {
        return strtoupper($this->attributes['name']);
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->attributes['updated_at'];
    }
}
