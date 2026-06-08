<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mensaje = Mensaje::create([
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'destinatario_id' => $request->destinatario_id,
            'remitente_id' => $request->remitente_id,
            'leido' => false,
        ]); 

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $missatge = Mensaje::with('remitente','destinatario')->find($id);

        if (!$missatge) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
    
        return response()->json($missatge);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function missatgesTeus($id){
        $missatges = Mensaje::with('remitente')->where('destinatario_id', $id)->get();
        return response()->json($missatges);
    }

    public function missatgesEnviats($id){
        $missatges = Mensaje::with('destinatario')->where('remitente_id', $id)->get();
        return response()->json($missatges);
    }

    public function canviarStatusMissatge($id){
        $missatge = Mensaje::find($id);

        if (!$missatge) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $missatge->leido = true;
        $missatge->save();

        return response()->json($missatge);
    }
}
