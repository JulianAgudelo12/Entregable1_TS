<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

use App\Models\Computer;

class ComputerDataBuilder
{
    public static function fillComputerData(Computer $computer, $request): void
    {
        $computer->setReference($request->input('reference'));
        $computer->setName($request->input('name'));
        $computer->setBrand($request->input('brand'));
        $computer->setQuantity($request->input('quantity'));
        $computer->setType($request->input('type'));
        $computer->setDescription($request->input('description'));
        $computer->setImage($request->input('image'));
        $computer->setPrice($request->input('price'));
    }
}
