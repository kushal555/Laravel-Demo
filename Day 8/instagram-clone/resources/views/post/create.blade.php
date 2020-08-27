@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form>
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
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-primary">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
