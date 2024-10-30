<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TarefasController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::post("/login", "login");
    Route::post("/register", "register");
    Route::get("/logout", "logout");
});

Route::middleware(AuthMiddleware::class)->controller(TarefasController::class)->group(function () {
    Route::get("/home", "index")->name("index");
    Route::get("/find/{id}", "find")->name("find");
    Route::post("/store", "store")->name("store");
    Route::put("/update/{id}", "update")->name("update");
    Route::delete("/delete/{id}", "destroy")->name("destroy");
});
