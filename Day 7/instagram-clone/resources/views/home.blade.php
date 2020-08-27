@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <img src="{{ $post->user->profile->profile_pic_url ?: 'https://via.placeholder.com/150.png/09f/fff' }}" alt="profile-image" class="rounded-sm feed-profile-image">
                        <span>{{ $post->user->name  }}</span>
                        <span class="float-right">
                            <i class="fas fa-2x fa-user-times"></i>
                        </span>
                    </div>

                    <div class="card-body">
                        <figure class="figure">
                            <img src="{{ $post->image }}" class="figure-img img-fluid rounded" alt="{{ $post->title  }}">
                            <figcaption class="figure-caption">{{ $post->description  }}</figcaption>
                        </figure>
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
