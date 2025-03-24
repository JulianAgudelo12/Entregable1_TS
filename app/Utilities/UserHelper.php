<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

use App\Models\User;
use Illuminate\Http\Request;

class UserHelper
{
    public static function fillUserData(User $user, Request $request): void
    {
        $user->setName($request->input('name'));
        $user->setIsAdmin($request->has('is_admin'));
    }
}
