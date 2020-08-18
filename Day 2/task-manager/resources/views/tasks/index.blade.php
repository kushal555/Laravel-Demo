@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                @foreach([1,2,3,4,5] as $task)
                    <li class="list-group-item">
                        <span>Learn Laravel {{$task}}</span>
                        <button class="btn btn-danger btn-sm float-right mr-2">Delete</button>
                        <a href="{{ url('tasks/'.$task.'/edit') }}" class="btn btn-info btn-sm float-right mr-2">Edit</a>
                        <button class="btn btn-success btn-sm float-right mr-2">Complete</button>
                        <a href="{{ url('tasks', $task ) }}" class="btn btn-secondary btn-sm float-right mr-2">View Detail</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
