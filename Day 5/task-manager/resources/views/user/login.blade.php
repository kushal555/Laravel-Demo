@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="{{ url('login-check')  }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <button class="btn btn-primary btn-block btn-lg">Login</button>
            </form>

        </div>
    </div>
@stop
