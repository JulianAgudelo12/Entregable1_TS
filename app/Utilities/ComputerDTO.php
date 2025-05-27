<?php

/* Developed by Valeria Corrales Hoyos */

namespace App\Utilities;

class ComputerDTO
{
    public static function getApiAttributes($computer): array
    {
        return [
            'id' => $computer->getId(),
            'reference' => $computer->getReference(),
            'name' => $computer->getName(),
            'brand' => $computer->getBrand(),
            'quantity' => $computer->getQuantity(),
            'type' => $computer->getType(),
            'description' => $computer->getDescription(),
            'price' => $computer->getPrice(),
        ];
    }

    public static function getAttributes($computer): array
    {
        return [
            __('computer.reference') => $computer->getReference(),
            __('computer.name') => $computer->getName(),
            __('computer.brand') => $computer->getBrand(),
            __('computer.quantity') => $computer->getQuantity(),
            __('computer.type') => $computer->getType(),
            __('computer.description') => $computer->getDescription(),
            __('computer.price') => $computer->getPrice(),
        ];
    }
}
