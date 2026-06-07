<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/projectes', [ProjectController::class, 'index']);      // listar
    Route::get('/projectes/{id}', [ProjectController::class, 'show']);   // uno
    Route::post('/projectes', [ProjectController::class, 'store']);      // crear
    Route::put('/projectes/{id}', [ProjectController::class, 'update']); // actualizar
    Route::delete('/projectes/{id}', [ProjectController::class, 'destroy']); // borrar

    Route::get('/latestProjecte', [ProjectController::class, 'latestProject']);   // uno

});