<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Http\Controllers\AuthController;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
        try {

            return AuthController::login($request);
        } catch (Exception $e) {

            return response()->json(["error" => $e]);
        }
    }

    public function logout()
    {
        auth()->logout(true);
        return response()->json(['message' => 'Successfully logged out']);
    }
}
