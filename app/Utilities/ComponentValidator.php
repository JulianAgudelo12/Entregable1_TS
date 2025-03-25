<?php

/* Developed by Julian Agudelo */

namespace App\Utilities;

use Illuminate\Http\Request;

class ComponentValidator extends Request
{
    public static function validateComponent(Request $request): void
    {
        $request->validate([
            'reference' => 'required|string',
            'name' => 'required|string',
            'brand' => 'required|string',
            'quantity' => 'required|integer',
            'speed' => 'required|string',
            'capacity' => 'nullable|string',
            'generation' => 'required|string',
            'type' => 'required|string',
            'cores' => 'nullable|integer',
            'price' => 'required|integer',
            'image' => 'required|image',
        ]);
    }
}
