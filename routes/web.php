<?php

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/createMessage', function () {
    return view('createMessage');
})->name('createMessage');