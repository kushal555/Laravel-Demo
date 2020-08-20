@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                @foreach($tasks as $task)
                    <li class="list-group-item">
                        <span>{{$task->title}}</span>
                        <form action="{{  url('tasks',$task->id)  }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm float-right mr-2">Delete</button>
                        </form>
                        <a href="{{ url('tasks/'.$task->id.'/edit') }}" class="btn btn-info btn-sm float-right mr-2">Edit</a>
                        <button class="btn btn-success btn-sm float-right mr-2">Complete</button>
                        <a href="{{ url('tasks', $task->id ) }}" class="btn btn-secondary btn-sm float-right mr-2">View Detail</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{ url('tasks/create')  }}" role="button">Add Task</a>
        </div>
    </div>
@stop
