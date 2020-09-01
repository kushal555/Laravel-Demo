<?php

namespace App\Http\Controllers;

use App\Jobs\PostCreated;
use App\Mail\PostCreatedNotification;
use App\Events\PostCreatedNotification as PostEvent;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
//        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::first(); // we successfully create a post
        $followers = $post->user->followers;
        $follower = $followers->first();


        $mailContent = collect([]);
        $mailContent->put('title' , $post->title);
        $mailContent->put('created_by' ,$post->user->name);
        $mailContent->put('follower',$follower->followBy->email);
//        $mailContent->follower = $follower->followBy->email;

//        dd($mailContent);

        event(new PostEvent($mailContent));
        $posts = Post::with('user','user.profile')->latest()->get();
        return view('home',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return ['message'=>'Deleted successfully'];
    }
}
