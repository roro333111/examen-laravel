<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploController extends Controller
{
    // LISTAR TODOS
    public function index()
    {
        return response()->json(Telefono::all());
    }

    // OBTENER UNO
    public function show($id)
    {
        $telefono = Telefono::find($id);

        if (!$telefono) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($telefono);
    }

    // CREAR
    public function store(Request $request)
    {
        $telefono = Telefono::create([
            'numero' => $request->numero,
            'tipo' => $request->tipo
        ]);

        return response()->json($telefono);
    }

    // ACTUALIZAR
    public function update(Request $request, $id)
    {
        $telefono = Telefono::find($id);

        if (!$telefono) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $telefono->update($request->all());

        return response()->json($telefono);
    }

    // BORRAR
    public function destroy($id)
    {
        $telefono = Telefono::find($id);

        if (!$telefono) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $telefono->delete();

        return response()->json(['message' => 'Eliminado']);
    }
}
