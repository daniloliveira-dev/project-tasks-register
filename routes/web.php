<?php

use App\Http\Controllers\TarefasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });

Route::controller(UsuariosController::class)->group(function () {
    Route::get("/", "index")->name("login");
    Route::get("/register", "create")->name("register");
    Route::post("/create-user", "store")->name("new-user");
});
Route::controller(TarefasController::class)->prefix("home")->group(function () {
    Route::get("/", "index")->name("home.index");
    Route::get("/create-task", "create")->name("home.create");
    Route::post("/store", "store")->name("home.store");
    Route::get("/edit/{id}", "edit")->name("home.edit");
    Route::put("/update/{id}", "update")->name("home.update");
});
