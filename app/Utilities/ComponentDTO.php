<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

class ComponentDTO
{
    public static function getApiAttributes($component): array
    {
        return [
            'id' => $component->getId(),
            'reference' => $component->getReference(),
            'name' => $component->getName(),
            'brand' => $component->getBrand(),
            'quantity' => $component->getQuantity(),
            'type' => $component->getType(),
            'speed' => $component->getSpeed(),
            'capacity' => $component->getCapacity(),
            'generation' => $component->getGeneration(),
            'cores' => $component->getCores(),
            'description' => $component->getDescription(),
            'image' => $component->getImage(),
            'price' => $component->getPrice(),

        ];
    }

    public static function getAttributes($component): array
    {
        return [
            __('component.reference') => $component->getReference(),
            __('component.name') => $component->getName(),
            __('component.brand') => $component->getBrand(),
            __('component.quantity') => $component->getQuantity(),
            __('component.type') => $component->getType(),
            __('component.speed') => $component->getSpeed(),
            __('component.capacity') => $component->getCapacity(),
            __('component.generation') => $component->getGeneration(),
            __('component.cores') => $component->getCores(),
            __('component.description') => $component->getDescription(),
            __('component.price') => $component->getPrice(),
        ];
    }
}
