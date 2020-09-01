<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $fillable = ['title','description', 'image', 'user_id' ,'hashtag','driver_type'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute(){
        if ($this->driver_type == 'url') {
            return $this->image;
        }elseif($this->driver_type == 's3'){
            return Storage::disk('s3')->temporaryUrl(
                $this->image, now()->addMinutes(5)
            );
        }else{
            return asset('storage/'.$this->image);
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
