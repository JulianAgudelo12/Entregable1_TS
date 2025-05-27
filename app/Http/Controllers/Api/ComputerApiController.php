<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Utilities\ComputerDTO;
use Illuminate\Http\JsonResponse;

class ComputerApiController extends Controller
{
    public function index(): JsonResponse
    {
        $computers = Computer::all();

        $result = $computers->map(fn($computer) => ComputerDTO::getApiAttributes($computer));

        return response()->json($result, 200);
    }

    public function show(string $id): JsonResponse
    {
        $computer = Computer::findOrFail($id);

        return response()->json(ComputerDTO::getApiAttributes($computer), 200);
    }
}
