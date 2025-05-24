<?php

/* Developed by Julian Agudelo */

namespace App\Utilities;

use App\Models\PC_Component;
use Illuminate\Http\Request;

class PCComponentHelper
{
    public static function fillComponentData(PC_Component $pcComponent, Request $request): void
    {
        $pcComponent->setReference($request->input('reference'));
        $pcComponent->setName($request->input('name'));
        $pcComponent->setBrand($request->input('brand'));
        $pcComponent->setQuantity($request->input('quantity'));
        $pcComponent->setSpeed($request->input('speed'));
        $pcComponent->setCapacity($request->input('capacity'));
        $pcComponent->setGeneration($request->input('generation'));
        $pcComponent->setType($request->input('type'));
        $pcComponent->setCores($request->input('cores'));
        $pcComponent->setPrice($request->input('price'));
    }

    public static function getAttributes($pcComponent): array
    {
        return [
        __('pc_component.reference') => $pcComponent->getReference(),
        __('pc_component.brand') => $pcComponent->getBrand(),
        __('pc_component.quantity') => $pcComponent->getQuantity(),
        __('pc_component.speed') => $pcComponent->getSpeed(),
        __('pc_component.capacity') => $pcComponent->getCapacity(),
        __('pc_component.generation') => $pcComponent->getGeneration(),
        __('pc_component.type') => $pcComponent->getType(),
        __('pc_component.cores') => $pcComponent->getCores(),
        __('pc_component.price') => $pcComponent->getPrice(),
        ];
    }
}
