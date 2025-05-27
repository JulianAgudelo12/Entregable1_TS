<?php

/* Developed by Julian Agudelo */

namespace App\Utilities;

use Illuminate\Http\Request;

class PC_ComponentValidator extends Request
{
    public static function validatePC_Component(Request $request): void
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
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);
    }

    public static function validateUpdate(Request $request): void
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
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
    }
}
