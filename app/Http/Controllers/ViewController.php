<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return inertia("Login");
    }

    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return inertia("Register");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("Homepage");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($token)
    {
        return inertia("Create", $token);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $token)
    {
        $task = Tarefa::find($id);
        return inertia("Edit", [
            compact("task"),
            $token
        ]);
    }
}
