<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MensajeController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/users', [AuthController::class, 'users']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/missatges/{id}', [MensajeController::class, 'show']);
    Route::post('/missatges', [MensajeController::class, 'store']);
    Route::get('/missatgesTeus/{id}', [MensajeController::class, 'missatgesTeus']);
    Route::get('/missatgesEnviats/{id}', [MensajeController::class, 'missatgesEnviats']);
    Route::put('/canviarStatusMissatge/{id}', [MensajeController::class, 'canviarStatusMissatge']);
});