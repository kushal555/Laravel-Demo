@extends('layout.app')

@section('content')
    <form action="{{ url('tasks/')  }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title"  name="title" class="form-control">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" rows="5">
                </textarea>
            </div>
        <button class="btn btn-primary">Add</button>
    </form>
@stop
