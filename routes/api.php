<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);

    Route::post('/logout', [AuthController::class, 'logout']);

    /*Route::get('/telefonos', [TelefonoController::class, 'index']);      // listar
    Route::get('/telefonos/{id}', [TelefonoController::class, 'show']);   // uno
    Route::post('/telefonos', [TelefonoController::class, 'store']);      // crear
    Route::put('/telefonos/{id}', [TelefonoController::class, 'update']); // actualizar
    Route::delete('/telefonos/{id}', [TelefonoController::class, 'destroy']); // borrar*/

});