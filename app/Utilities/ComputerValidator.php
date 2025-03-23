<?php

namespace App\Utilities;

use Illuminate\Http\Request;

class ComputerValidator
{
    public static function validate(Request $request): void
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
}
