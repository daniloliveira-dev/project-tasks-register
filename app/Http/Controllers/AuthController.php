<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        try {
            $user = User::create([
                "name" => $request->nome,
                "email" => $request->email,
                "password" => md5($request->password)
            ]);

            if ($user) {
                return response()->json([
                    "response" => "Criado com sucesso",
                    "status" => 200
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                "response" => "Usuario nao foi criado, tente novamente",
            ], 400);
        }
    }

    public function login(LoginRequest $request)
    {
        $input = $request->validated();
        $credentials = $input;

        if ($token = auth()->attempt($credentials)) {

            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
