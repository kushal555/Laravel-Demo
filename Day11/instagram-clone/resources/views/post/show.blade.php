@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h5>{{ $post->title  }}</h5>
                @canany(['show-post','delete-post'],$post)
                    <a href="{{ route('post.edit',$post)  }}">Update Post</a>
                @endcan
            </div>
        </div>
    </div>
@endsection
