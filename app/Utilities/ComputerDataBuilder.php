<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComputerHelper
{
    public static function fillComputerData(Computer $computer, $request): void
    {
        $computer->setReference($request->input('reference'));
        $computer->setName($request->input('name'));
        $computer->setBrand($request->input('brand'));
        $computer->setQuantity($request->input('quantity'));
        $computer->setType($request->input('type'));
        $computer->setDescription($request->input('description'));
        $computer->setPrice($request->input('price'));
    }
}
