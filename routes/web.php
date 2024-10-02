<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\AuthMiddleware;

Route::withoutMiddleware(AuthMiddleware::class)->controller(ViewController::class)->prefix("home")->group(function () {

    Route::get("/", "index")->name("home.index");
    Route::get("/create-task", "create")->name("home.create");
    Route::get("/edit/{id}", "edit")->name("home.edit");
});
