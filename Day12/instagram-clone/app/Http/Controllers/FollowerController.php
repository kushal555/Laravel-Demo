<?php

namespace App\Http\Controllers;

use App\Follower;
use App\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{

    public function follow(User $follow_by, User $follow_to){
        $follow = new Follower();
        $follow->follow_by = $follow_by->id;
        $follow->follow_to = $follow_to->id;
        $follow->save();
        return $follow;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Follower  $follower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follower $follower)
    {
        //
    }
}
