<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // show the task for relevant userid 
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks;

        return view('tasks.index', compact('tasks'));
    }

    // Store a task 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
        ]);

        return redirect()->back();
    }



    // Update task
    public function update(Request $request, Task $task)
    {
        abort_unless($task->user_id === $request->user()->id, 403);

        $task->update([
            'is_completed' => !$task->is_completed,
        ]);

        return redirect()->back();
    }



    // Delete task
    public function destroy(Request $request, Task $task)
    {
        abort_unless($task->user_id === $request->user()->id, 403);

        $task->delete();

        return redirect()->back();
    }




}