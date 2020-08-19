@extends('layout.app')

@section('content')
    <form method="post" action="{{ url('tasks',$task->id)  }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title"  value="{{ $task->title  }}" name="title" class="form-control">
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="5">
                {{ $task->description  }}
                </textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@stop
