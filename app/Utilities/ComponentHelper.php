<?php

/* Developed by Julian Agudelo */

namespace App\Utilities;

use App\Models\Component;
use Illuminate\Http\Request;

class ComponentHelper
{
    public static function fillComponentData(Component $component, Request $request): void
    {
        $component->setReference($request->input('reference'));
        $component->setName($request->input('name'));
        $component->setBrand($request->input('brand'));
        $component->setQuantity($request->input('quantity'));
        $component->setSpeed($request->input('speed'));
        $component->setCapacity($request->input('capacity'));
        $component->setGeneration($request->input('generation'));
        $component->setType($request->input('type'));
        $component->setCores($request->input('cores'));
        $component->setPrice($request->input('price'));
    }
}
