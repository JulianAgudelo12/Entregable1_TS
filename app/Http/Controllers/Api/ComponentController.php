<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Component; //  Import the Component model
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $components = Component::all();
        return response()->json($components, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            //  Add other validation rules as needed
        ]);

        $component = Component::create($request->all());
        return response()->json($component, 201); //  201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $component = Component::find($id);

        if (! $component) {
            return response()->json(['message' => 'Component not found'], 404);
        }

        return response()->json($component, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'name' => 'string',
            'price' => 'numeric',
            //  Add other validation rules as needed
        ]);

        $component = Component::find($id);

        if (! $component) {
            return response()->json(['message' => 'Component not found'], 404);
        }

        $component->update($request->all());
        return response()->json($component, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $component = Component::find($id);

        if (! $component) {
            return response()->json(['message' => 'Component not found'], 404);
        }

        $component->delete();
        return response()->json(['message' => 'Component deleted successfully'], 200);
    }
}