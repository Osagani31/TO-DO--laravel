<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //To show all the Tasks on the index.blade.php
    public function index(){
       $tasks=Task::all();
       return view('tasks.index',compact('tasks'));
    }

    // to store task created
    public function store(Request $request){
        $request->validate(['title'=>'required|string|max:255']);
        Task::create(['title'=>$request->title,]);
        return redirect()->back();
    }

    //update
    public function update(Task $task){
        $task->update(['is_completed'=>!$task->is_completed,]);
        return redirect()->back();
    }

    //delete

    public function destroy(Task $task){
        $task->delete();
        return redirect()->back();



    }



}
