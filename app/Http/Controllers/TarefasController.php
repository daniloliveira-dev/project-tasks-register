<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tarefa::all();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tarefa::create([
            "task" => $request->task,
            "description" => $request->description,
            "data_criacao" => date("y-m-d")
        ]);
        return response()->json(["response" => "Task criada com sucesso"], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->update([
            "task" => $request->task,
            "description" => $request->description
        ]);
        return response()->json(["response" => "Task alterada com sucesso"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        return response()->json(["response" => "Task deletada com sucesso"], 200);
    }
}
