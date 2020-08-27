@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('post.store')  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="post_title">Post Title</label>
                        <input type="text" name="title" class="form-control" id="post_title" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="description">Post Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hashtag">Post Tag</label>
                        <input type="text" name="hashtag" class="form-control" id="hashtag" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="">Post Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" placeholder=""
                               aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">Help text</small>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-primary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
