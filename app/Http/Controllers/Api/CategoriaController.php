<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar todas las categorias
    public function index()
    {
        $categorias = Categoria::all();

        return response()->json($categorias, 200);
    }

    
    public function mostrarCategorias()
    {
        $categorias = Categoria::with('platillos')->get();

        return response()->json($categorias, 200);
    }

    // Mostrar una categoria
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'mensaje' => 'Categoria no encontrada'
            ], 404);
        }

        return response()->json($categoria, 200);
    }

    // Crear una categoria
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100'
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json([
            'mensaje' => 'Categoria creada correctamente',
            'datos' => $categoria
        ], 201);
    }

    // Actualizar una categoria
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'mensaje' => 'Categoria no encontrada'
            ], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:100'
        ]);

        $categoria->update($request->all());

        return response()->json([
            'mensaje' => 'Categoria actualizada correctamente',
            'datos' => $categoria
        ], 200);
    }

    // Eliminar una categoria
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'mensaje' => 'Categoria no encontrada'
            ], 404);
        }

        $categoria->delete();

        return response()->json([
            'mensaje' => 'Categoria eliminada correctamente'
        ], 200);
    }
}
