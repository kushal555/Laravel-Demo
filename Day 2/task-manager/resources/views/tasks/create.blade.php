@extends('layout.app')

@section('content')
    <form action="" method="post">
        @if(isset($task))
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{ $task['title']  }}" name="title" class="form-control">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" rows="5">
                    {{  $task['description'] }}
                </textarea>
            </div>
        @endif
        <button class="btn btn-primary">Add</button>
    </form>
@stop
