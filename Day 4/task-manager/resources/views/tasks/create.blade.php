@extends('layout.app')

@section('content')
{{--    @if($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
    <form action="{{ url('tasks/')  }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title"  name="title" value="{{ old('title')  }}" class="form-control @error('title') is-invalid @enderror ">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('title')  }}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        <button class="btn btn-primary">Add</button>
    </form>
@stop
