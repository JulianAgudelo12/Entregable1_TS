<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * WISHLIST ATTRIBUTES
     * $this->attributes['id'] - int - contains the wishlist primary key (id)
     * $this->attributes['name'] - string - contains the wishlist name
     * $this->attributes['user_id'] - int - contains the related user id
     * $this->attributes['items'] - array - contains the list of items in the wishlist
     * $this->attributes['created_at'] - timestamp - contains the wishlist created date
     * $this->attributes['updated_at'] - timestamp - contains the wishlist update date
     */

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getItems(): array
    {
        return $this->attributes['items'] ?? [];
    }

    public function setItems(array $items): void
    {
        $this->attributes['items'] = $items;
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
