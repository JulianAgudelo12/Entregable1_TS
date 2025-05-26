<?php
/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;

class UserValidator
{
    public static function validate(array $data): ValidatorContract
    {
        return Validator::make($data, [
            'name'                  => ['required','string','max:255'],
            'email'                 => ['required','email','max:255','unique:users'],
            'cellphone'             => ['required','string','min:10','max:10','unique:users,cellphone'],
            'password'              => ['required','string','min:8','confirmed'],
        ], [
            'cellphone.min' => __('validation.cellphone'),
            'cellphone.max' => __('validation.cellphone'),
        ]);
    }
}
