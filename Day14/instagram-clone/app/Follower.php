<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function followBy(){
        return $this->belongsTo(User::class,'follow_by');
    }

    public function followTo(){
        return $this->belongsTo(User::class,'follow_to');
    }
}
