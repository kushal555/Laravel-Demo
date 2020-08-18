<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('tasks.index');
    }

    public function create(){
        return view('tasks.create');
    }

    public function show(){
        return view('tasks.show');
    }

    public function edit(){
        $task = [
            'title' => 'First Task',
            'description' => 'This is the Description'
        ];
        return view('tasks.create');
    }
}
