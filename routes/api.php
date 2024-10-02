<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TarefasController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(AuthMiddleware::class)->controller(TarefasController::class)->group(function () {

    Route::withoutMiddleware(AuthMiddleware::class)->controller(AuthController::class)->group(function () {

        Route::post("/login", [AuthController::class, "login"]);
        Route::post("/register", [AuthController::class, "register"]);

        Route::get("/home", [TarefasController::class, "index"])->name("index");
        Route::post("/store", [TarefasController::class, "store"])->name("store");
        Route::put("/update/{id}", [TarefasController::class, "update"])->name("update");
        Route::delete("/delete/{id}", [TarefasController::class, "destroy"])->name("destroy");
    });
    // Route::get("/home", "index")->name("index");
    // Route::post("/store", "store")->name("store");
    // Route::put("/update/{id}", "update")->name("update");
    // Route::delete("/delete/{id}", "destroy")->name("destroy");
});
