<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return inertia('Home', ['user' => 'Gustavo']);
})->name('home');

Route::inertia('/about','About')->name('about');

Route::inertia('/register', 'Auth/Register')->name('register');

Route::post('/register', [AuthController::class, 'register']);