<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


Route::get('/', [TaskController::class, 'index'])
    ->middleware('auth')
    ->name('home');


// Login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Register page
Route::get('/register', function () {
    return view('auth.register');
});


// Authentication 
Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Tasks
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');

Route::patch('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');

//user delete

Route::delete('/account', [UserController::class, 'destroy']) ->middleware('auth');