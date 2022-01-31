<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\AuthController;

Route::get('/', [MainController::class, 'index'])->name('mainPage');
Route::get('/registration', [AuthController::class, 'registrationPage'])->name('registrationPage');
Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
