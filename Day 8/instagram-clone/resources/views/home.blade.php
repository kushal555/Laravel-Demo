@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <img src="{{ $post->user->profile->profile_pic_url ?: 'https://via.placeholder.com/150.png/09f/fff' }}" alt="profile-image" class="rounded-sm feed-profile-image">
                        <a href="{{ route('user.show',$post->user->username)  }}">{{ $post->user->name  }}</a>
                        @auth
                            <span class="float-right">
                                <i class="fas fa-2x fa-user-plus"></i>
                            </span>
                        @endauth
                    </div>
                    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        {{ $post->description  }}
                    </div>
                    <div class="card-footer">
                        <span class="float-left">
                            <i class="fas fa-comment-alt"></i>
                        </span>
                        <span class="float-right">
                            <i class="fas fa-thumbs-up"></i>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
