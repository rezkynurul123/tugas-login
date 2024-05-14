<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginUser'])->name('login_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(['authenticate', 'role:superadmin|user']);

Route::get('/login/google', [UserController::class, 'loginGoogle'])->name('login_google');
Route::get('/login/google/callback', [UserController::class, 'loginGoogleCallback'])->name('callback_google');
