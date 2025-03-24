<?php

namespace App\Utilities;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerHelper
{
    public static function fillComputerData(Computer $computer, Request $request): void
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
