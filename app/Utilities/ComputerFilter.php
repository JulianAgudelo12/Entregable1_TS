<?php

namespace App\Utilities;

use App\Models\Computer;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class ComputerFilter
{
    public static function apply(Request $request): Builder
    {
        $query = Computer::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->filled('brand')) {
            $query->where('brand', 'like', '%'.$request->brand.'%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        return $query;
    }
}
