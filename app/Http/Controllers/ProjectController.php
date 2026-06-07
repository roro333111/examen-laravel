<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Project::all());
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
        $project = Project::create([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio,
            'data_ini' => $request->data_ini,
            'data_fi' => $request->data_fi,
            'user_id' => $request->user_id,
        ]);

        return response()->json($project);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::with('tasks')->find($id);

        if (!$project) {
            return response()->json(['message' => 'No encontrado'], 404);
        }
    
        return response()->json($project);
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
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $project->update($request->all());

        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Eliminado']);
    }

    public function latestProject()
    {
        return response()->json(Project::with('tasks')->latest()->first());
    }
}
