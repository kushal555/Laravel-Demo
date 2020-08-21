<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
//        dd(session('user')->tasks->count());
//        $tasks = session('user')->tasks;
        // $task = Task::where('user_id', session('user')->id)->get();
        return view('tasks.index');
    }

    public function create(){
        return view('tasks.create');
    }

    public function show(Task $task){
        return view('tasks.show',['task'=>$task]);
    }

    public function store(){

        $task = request()->validate([
            'title' => ['required','min:5'],
            'description' => ['required','min:5']
        ]);

        Task::create($task + ['user_id' => session('user')->id]);

        if($task->id){
            flash('alert-success','Task  Created successfully');

        }else{
            flash('alert-danger','Opps! something going wrong');
        }

        return redirect('/tasks');
    }

    public function update(Task $task){

        $task->update(['title'=>request('title'),'description'=>request('description')]);
        flash('alert-success','Task  Updated successfully');
        return redirect('/tasks');
    }

    public function edit(Task $task){
        return view('tasks.edit',['task'=>$task]);
    }

    public function destroy(Task $task){
        $task->delete();
        flash('alert-success','Task  Deleted successfully');
        return redirect('/tasks');
    }
}
