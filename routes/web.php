<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [UserController::class, 'login'])-> name('login');
Route::post('/login', [UserController::class, 'authenticate'])-> name('login.authenticate');

Route::get('/admin', [MainController::class, 'index'])-> name('admin.main.index')->middleware('auth');
