<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index',['tasks' => $tasks]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function show(Task $task){
        return view('tasks.show',['task'=>$task]);
    }

    public function store(){
//        $task = new Task;
//        $task->title = request('title');
//        $task->description = request('description');
//        $task->save();
        Task::create(request()->all());

        return redirect('/tasks');
    }

    public function update(Task $task){

        $task->update(['title'=>request('title'),'description'=>request('description')]);
        return redirect('/tasks');
    }

    public function edit(Task $task){
        return view('tasks.edit',['task'=>$task]);
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/tasks');
    }
}
