<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('daftar', function (){
    return view('mytask.other-task');
});

Route::get('dashboard', [TaskController::class, 'dashboard'])->name('dashboard');

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'loginProcess'])->name('loginproses')->middleware('guest');

Route::get('register', [AuthController::class,'register'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'registerProcess'])->name('registerproses')->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('task/', [TaskController::class, 'task'])->name('task');
