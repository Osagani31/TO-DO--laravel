<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

 Route::get('/', [TaskController::class, 'index'])->middleware('auth');

 Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');

Route::patch('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::delete('/account', [UserController::class, 'destroy'])->middleware('auth');