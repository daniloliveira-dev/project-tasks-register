<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Exception;
use Illuminate\Http\Request;


class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tarefa::all();
        return response()->json($tasks);
    }

    public function find($id)
    {
        $task = Tarefa::find($id);
        if ($task) {

            return response()->json(["response" => $task], 200);
        }
        return response()->json([
            "response" => "Não foi encontrado nenhum resultado"
        ], 200);
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
    public function update(Request $request, $id)
    {
        $tarefa = Tarefa::find($id);
        try {
            if ($tarefa) {

                $tarefa->update([
                    "task" => $request->task != "" ? $request->task : $tarefa->task,
                    "description" => $request->description != "" ? $request->description : $tarefa->description
                ]);
                return response()->json(["response" => "Task alterada com sucesso"], 200);
            }
        } catch (Exception $e) {

            return response()->json(["response" => "Alteração não foi feita"], 400);
        }
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
