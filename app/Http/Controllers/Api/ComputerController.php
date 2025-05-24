<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importa la clase Storage

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $computers = Computer::all();

        return response()->json($computers, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //  Validación de la imagen
        ]);

        $imagenPath = null;

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('computadoras', 'public'); // Almacena la imagen
        }

        $computer = Computer::create([
            'name' => $request->input('name'),
            'imagen_path' => $imagenPath,
        ]);

        return response()->json($computer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $computer = Computer::find($id);

        if (! $computer) {
            return response()->json(['message' => 'Computer not found'], 404);
        }

        return response()->json($computer, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'name' => 'string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de la imagen
        ]);

        $computer = Computer::find($id);

        if (! $computer) {
            return response()->json(['message' => 'Computer not found'], 404);
        }

        $imagenPath = $computer->imagen_path; // Conservar la imagen anterior

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($imagenPath) {
                Storage::delete('public/'.$imagenPath);
            }
            $imagenPath = $request->file('imagen')->store('computadoras', 'public'); // Almacenar la nueva imagen
        }

        $computer->update([
            'name' => $request->input('name'),
            'imagen_path' => $imagenPath,
        ]);

        return response()->json($computer, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $computer = Computer::find($id);

        if (! $computer) {
            return response()->json(['message' => 'Computer not found'], 404);
        }

        // Eliminar la imagen asociada si existe
        if ($computer->imagen_path) {
            Storage::delete('public/'.$computer->imagen_path);
        }

        $computer->delete();

        return response()->json(['message' => 'Computer deleted successfully'], 200);
    }

    public function uploadImage(Request $request, $id): JsonResponse
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagenPath = $request->file('imagen')->store('computadoras', 'public');

        $computer = Computer::find($id);

        if (! $computer) {
            return response()->json(['message' => 'Computer not found'], 404);
        }

        // Eliminar la imagen anterior si existe
        if ($computer->imagen_path) {
            Storage::delete('public/'.$computer->imagen_path);
        }

        $computer->imagen_path = $imagenPath;
        $computer->save();

        return response()->json(['message' => 'Imagen cargada con éxito'], 200);
    }
}
