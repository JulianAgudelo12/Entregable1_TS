<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Support\Facades\Validator;

class UserValidator
{
    public static function validate(array $data): ValidatorContract
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'cellphone' => ['required', 'string', 'min:10', 'max:10', 'unique:users,cellphone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'cellphone.min' => __('validation.cellphone_length'),
            'cellphone.max' => __('validation.cellphone_length'),
            'cellphone.unique' => __('validation.cellphone_unique'),
        ]);
    }
}
