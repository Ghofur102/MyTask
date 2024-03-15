<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'loginProcess'])->name('loginproses')->middleware('guest');

Route::get('register', [AuthController::class,'register'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'registerProcess'])->name('registerproses')->middleware('guest');
