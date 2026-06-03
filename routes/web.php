<?php

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'login']);

Route::get('/dashboard', [PageController::class, 'dashboard']);