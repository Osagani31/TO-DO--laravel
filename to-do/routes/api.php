<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/dashboard/stats', function (Request $request) {

    $user = $request->user();

    $totalTasks = $user->tasks()->count();

    $completedTasks = $user->tasks()
        ->where('is_completed', true)
        ->count();

    $pendingTasks = $user->tasks()
        ->where('is_completed', false)
        ->count();

    $completionPercentage = $totalTasks > 0
        ? round(($completedTasks / $totalTasks) * 100, 2)
        : 0;

    return response()->json([
        'total_tasks' => $totalTasks,
        'completed_tasks' => $completedTasks,
        'pending_tasks' => $pendingTasks,
        'completion_percentage' => $completionPercentage,
    ]);

})->middleware('auth:api');