<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title','description', 'image', 'user_id' ,'hashtag'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute(){
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }else{
            return asset('storage/'.$this->image);
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
