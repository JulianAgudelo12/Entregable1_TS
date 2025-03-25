<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile; // Add this line
use Illuminate\Support\Facades\Storage; // Add this line
use Carbon\Carbon; // Add this line

/**
 * COMPONENT ATTRIBUTES
 * $this->attributes['id'] - int - contains the component primary key
 * $this->attributes['reference'] - string - contains the component reference
 * $this->attributes['name'] - string - contains the component name
 * $this->attributes['brand'] - string - contains the brand
 * $this->attributes['quantity'] - int - contains the quantity
 * $this->attributes['image_path'] - string - contains the image path  <-- Changed from 'image' to 'image_path'
 * $this->attributes['speed'] - string - contains the speed
 * $this->attributes['capacity'] - string|null - contains the capacity
 * $this->attributes['generation'] - string - contains the generation
 * $this->attributes['type'] - string - contains the type
 * $this->attributes['cores'] - int|null - contains the number of cores
 * $this->attributes['price'] - float - contains the price
 * $this->attributes['created_at'] - timestamp - contains the computer created date
 * $this->attributes['updated_at'] - timestamp - contains the computer update date
 */
class Component extends Model
{
    protected $fillable = [
        'reference',
        'name',
        'brand',
        'quantity',
        'image_path',  // <-- Changed from 'image' to 'image_path'
        'speed',
        'capacity',
        'generation',
        'type',
        'cores',
        'price',
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

    //  Removed setImageAttribute method

    public function getImagePath(): ?string // Changed from getImage to getImagePath
    {
        return $this->attributes['image_path'] ?? null; // Changed from 'image' to 'image_path'
    }

    public function setImagePath(string $imagePath): void  //  Added setImagePath
    {
        $this->attributes['image_path'] = $imagePath;
    }

    public function getSpeed(): string
    {
        return $this->attributes['speed'];
    }

    public function setSpeed(string $speed): void
    {
        $this->attributes['speed'] = $speed;
    }

    public function getCapacity(): ?string
    {
        return $this->attributes['capacity'] ?? null;
    }

    public function setCapacity(string $capacity): void
    {
        $this->attributes['capacity'] = $capacity;
    }

    public function getGeneration(): string
    {
        return $this->attributes['generation'];
    }

    public function setGeneration(string $generation): void
    {
        $this->attributes['generation'] = $generation;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getCores(): ?int
    {
        return $this->attributes['cores'] ?? null;
    }

    public function setCores(int $cores): void
    {
        $this->attributes['cores'] = $cores;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
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