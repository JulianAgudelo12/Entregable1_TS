<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * COMPUTER ATTRIBUTES
 *
 * $this->ATTRIBUTES['id']           - int        - Primary key of the computer
 * $this->ATTRIBUTES['reference']    - string     - Reference code of the computer
 * $this->ATTRIBUTES['name']         - string     - Name of the computer
 * $this->ATTRIBUTES['brand']        - string     - Brand of the computer
 * $this->ATTRIBUTES['quantity']     - int        - Stock quantity of the computer
 * $this->ATTRIBUTES['type']         - string     - Type of computer [PC, LAPTOP]
 * $this->ATTRIBUTES['description']  - string     - Description of the computer
 * $this->ATTRIBUTES['price']        - float      - Price of the computer
 * $this->ATTRIBUTES['image']        - string     - URL or path to the computer image
 * $this->ATTRIBUTES['created_at']   - timestamp  - Creation date and time
 * $this->ATTRIBUTES['updated_at']   - timestamp  - Last update date and time
 */

class Computer extends Model
{
    protected $fillable = [
        'reference',
        'name',
        'brand',
        'quantity',
        'type',
        'description',
        'price',
        'image',
    ];

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
        return $this->attributes['name'];
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

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getImage(): string
    {
        return $this->attributes['image'] ?? '';
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'] ?? '';
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'] ?? '';
    }
}
