@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" value="{{ $user->name  }}" name="username" class="form-control">
                </div>

                {{ $user->email  }}
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <button class="btn btn-primary btn-block btn-lg">Login</button>
            </form>
        </div>
    </div>
@stop
