<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * USER ATTRIBUTES
 *
 * $this->attributes['id']                 - int       - contains the user primary key (id)
 * $this->attributes['name']               - string    - contains the user name
 * $this->attributes['email']              - string    - contains the user email
 * $this->attributes['password']           - string    - contains the user password
 * $this->attributes['cellphone']          - string    - contains the user cellphone
 * $this->attributes['remember_token']     - string    - contains the user authentication token
 * $this->attributes['is_admin']           - boolean   - represents the user role as admin (true) or client (false)
 * $this->attributes['email_verified_at']  - timestamp - contains the user email verification date
 * $this->attributes['created_at']         - timestamp - contains the user creation date
 * $this->attributes['updated_at']         - timestamp - contains the user update date
 */

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cellphone',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(?string $name): void
    {
        if ($name !== null) {
            $this->attributes['name'] = $name;
        }
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getCellphone(): string
    {
        return $this->attributes['cellphone'] ?? '';
    }

    public function setCellphone(string $cellphone): void
    {
        $this->attributes['cellphone'] = $cellphone;
    }

    public function getIsAdmin(): bool
    {
        return $this->attributes['is_admin'];
    }

    public function setIsAdmin(bool $isAdmin): void
    {
        $this->attributes['is_admin'] = $isAdmin;
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
