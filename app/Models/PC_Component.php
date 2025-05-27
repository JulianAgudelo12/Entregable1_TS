<?php

/* Developed by Julián Agudelo Cifuentes */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * PC_COMPONENT ATTRIBUTES
 *
 * $this->ATTRIBUTES['id']           - int       - Primary key of the PC_Component
 * $this->ATTRIBUTES['reference']    - string    - Reference code of the PC_Component
 * $this->ATTRIBUTES['name']         - string    - Name of the PC_Component
 * $this->ATTRIBUTES['brand']        - string    - Brand of the PC_Component
 * $this->ATTRIBUTES['quantity']     - int       - Stock quantity of the PC_Component
 * $this->ATTRIBUTES['image']        - string    - URL or path to the PC_Component image
 * $this->ATTRIBUTES['speed']        - string    - Speed specification of the PC_Component
 * $this->ATTRIBUTES['capacity']     - string    - Capacity of the PC_Component (nullable)
 * $this->ATTRIBUTES['generation']   - string    - Generation of the PC_Component (nullable)
 * $this->ATTRIBUTES['cores']        - int       - Number of cores (nullable)
 * $this->ATTRIBUTES['type']         - string    - Type of PC_Component [CPU, GPU, RAM, DISK]
 * $this->ATTRIBUTES['price']        - float     - Price of the PC_Component
 * $this->ATTRIBUTES['description']  - string    - Description of the PC_Component
 * $this->ATTRIBUTES['created_at']   - timestamp - Creation date and time
 * $this->ATTRIBUTES['updated_at']   - timestamp - Last update date and time
 */
class PC_Component extends Model
{
    protected $table = 'pc_components';

    protected $fillable = [
        'reference',
        'name',
        'brand',
        'quantity',
        'image',
        'speed',
        'capacity',
        'generation',
        'cores',
        'type',
        'price',
        'description',
    ];

    // Getters and Setters

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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
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
        return $this->attributes['capacity'];
    }

    public function setCapacity(?string $capacity): void
    {
        $this->attributes['capacity'] = $capacity;
    }

    public function getGeneration(): ?string
    {
        return $this->attributes['generation'];
    }

    public function setGeneration(?string $generation): void
    {
        $this->attributes['generation'] = $generation;
    }

    public function getCores(): ?int
    {
        return $this->attributes['cores'];
    }

    public function setCores(?int $cores): void
    {
        $this->attributes['cores'] = $cores;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getCreatedAt(): timestamp
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): timestamp
    {
        return $this->attributes['updated_at'];
    }
}
