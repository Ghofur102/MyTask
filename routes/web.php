<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', [TaskController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'loginProcess'])->name('loginproses')->middleware('guest');

Route::get('register', [AuthController::class,'register'])->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'registerProcess'])->name('registerproses')->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('task/', [TaskController::class, 'task'])->name('task');
Route::get('form', [TaskController::class,'form'])->name('form')->middleware('auth');
Route::post('form', [TaskController::class, 'store'])->name('formproses')->middleware('auth');

Route::post('status/{id}', [TaskController::class, 'status'])->name('status')->middleware('auth');
Route::get('daftar', [TaskController::class, 'daftar'])->name('daftar')->middleware('auth');
 Route::put('edit/{id}', [TaskController::class, 'update'])->name('update')->middleware('auth');
Route::delete('delete/{id}', [TaskController::class, 'delete'])->name('delete')->middleware('auth');
Route::delete('delete-notification/{id}', [TaskController::class, 'delete_notification'])->name('delete_notification')->middleware('auth');
