<?php

use Illuminate\Database\Seeder;
use App\User;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $users = User::all();

        foreach($users as $user){
            $posts = factory(\App\Post::class,3)->make();
            $i = 0;
            foreach($posts as $post){
                $post->user_id = $user->id;
                $post->save();
            }
        }

    }
}
