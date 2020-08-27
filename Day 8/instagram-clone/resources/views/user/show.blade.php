@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card flex-row flex-wrap">
            <div class="card-header">
                <img src="{{ $user->profile->profile_pic_url }}" alt="">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->name  }}
                    <span class="float-right">
                        <i class="fas fa-user-plus"></i>
                    </span>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $user->profile->about_me  }}</h6>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary">
                            Posts <span class="badge badge-light">{{ $user->posts->count()  }}</span>
                            <span class="sr-only">Followers</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary">
                            Followers <span class="badge badge-light">9</span>
                            <span class="sr-only">Posts</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
