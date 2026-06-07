<?php

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/createProject', function () {
    return view('createProject');
})->name('createProject');

Route::get('/editProject/{id}', function ($id) {
    return view('editProject', ['id' => $id]);
})->name('editProject');