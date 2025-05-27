<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

use App\Models\PC_Component;

class ComponentDataBuilder
{
    public static function fillComponentData(PC_Component $component, $request): void
    {
        $component->setReference($request->input('reference'));
        $component->setName($request->input('name'));
        $component->setBrand($request->input('brand'));
        $component->setQuantity($request->input('quantity'));
        $component->setType($request->input('type'));
        $component->setSpeed($request->input('name'));
        $component->setCapacity($request->input('brand'));
        $component->setGeneration($request->input('quantity'));
        $component->setCores($request->input('type'));
        $component->setDescription($request->input('description'));
        $component->setPrice($request->input('price'));
    }
}
