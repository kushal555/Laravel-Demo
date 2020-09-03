<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();
        foreach($users as $user){
            $profile = factory(\App\Profile::class)->make();
            $profile->user_id = $user->id;
            $profile->save();
        }
    }
}
