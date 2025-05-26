<?php

/* Developed by Julián Agudelo Cifuentes */

namespace App\Utilities;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreator
{
    public static function create(array $data): User
    {
        return User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'cellphone'  => $data['cellphone'],
            'password'   => Hash::make($data['password']),
        ]);
    }
}
