<?php

/* Developed by Santiago Rodriguez Mojica */

namespace App\Utilities;

use App\Models\Computer;
use Illuminate\Support\Facades\Validator;

class ItemValidator
{
    public static function validate(array $data): array
    {
        $computer = isset($data['computer_id']) ? Computer::find($data['computer_id']) : null;

        $rules = [
            'sub_total' => 'required|numeric|min:0',
            'quantity' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($computer) {
                    if ($computer && $value > $computer->getQuantity()) {
                        $fail("The requested quantity ($value) exceeds the available stock ({$computer->getQuantity()}).");
                    }
                },
            ],
            'order_id' => 'nullable|exists:orders,id|integer',
            'wishlist_id' => 'nullable|exists:wishlists,id|integer',
            'computer_id' => 'nullable|exists:computers,id|integer',
            'component_id' => 'nullable|exists:components,id|integer',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $validator->validated();
    }
}
