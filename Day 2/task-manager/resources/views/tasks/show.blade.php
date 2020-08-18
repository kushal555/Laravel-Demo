@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Learn Laravel</h3>
        </div>

        <div class="card-body">
            <p>This is the description of learn laravel task.</p>
            <p><a href="{{ url('tasks') }}">Back to Tasks</a></p>
        </div>
    </div>
@stop
