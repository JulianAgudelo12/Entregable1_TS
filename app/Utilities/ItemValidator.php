<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Utilities;

use Illuminate\Support\Facades\Validator;

class ItemValidator
{
    public static function validate(array $data): array
    {
        $rules = [
            'sub_total' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'order_id' => 'nullable|exists:orders,id',
            'wishlist_id' => 'nullable|exists:wishlists,id',
            'computer_id' => 'nullable|exists:computers,id',
            'component_id' => 'nullable|exists:components,id',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $validator->validated();
    }
}
