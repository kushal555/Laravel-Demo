<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['about_me','website','profile_pic_url'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
