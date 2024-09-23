<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia(
            "Login",
        );
    }

    public function auth(Request $request)
    {
        if (Usuarios::where(isset($request->email))->where(isset($request->password))) {

            return redirect()->with("message", "Logado com sucesso");
        } else {

            dd();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia("Register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|min: 3",
            "email" => "required|email:rfc",
            "password" => "required|min:6",
            "user" => "required|min: 3"
        ]);

        if ($validate) {
            Usuarios::create($request->all());
            return redirect()->route("homepage")->with("message", "Usuário criado com sucesso.");
        } else {
            return redirect()->route("auth")->with("message", "Há campos que não foram preenchidos");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
