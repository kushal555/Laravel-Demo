@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $task->title }}</h3>
        </div>

        <div class="card-body">
            <p>{{ $task->description }}.</p>
            <p><a href="{{ url('tasks') }}">Back to Tasks</a></p>
        </div>
    </div>
@stop
