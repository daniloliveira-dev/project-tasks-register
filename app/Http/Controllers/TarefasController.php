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
        sleep(2);
        $tasks = Tarefa::all();
        return Inertia("Homepage", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Create");
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
        return redirect()->route("home.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Tarefa::find($id);
        return Inertia("Edit", compact("task"));
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

        return redirect()->route("home.index")->with("message", "Tarefa atualizada com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();

        return redirect()->route("home.index")->with("message", "Tarefa excluída com sucesso");
    }
}
