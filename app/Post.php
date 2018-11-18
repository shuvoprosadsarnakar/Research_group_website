<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postType()
    {
        return $this->belongsTo('App\PostType', 'id', 'typeId');
    }

    public function image()
    {
        return $this->hasMany('App\Image', 'id', 'postId');
    }

    public function video()
    {
        return $this->hasMany('App\Video', 'id', 'postId');
    }

    public function reference()
    {
        return $this->hasMany('App\Reference', 'id', 'postId');
    }

    public function groupPost()
    {
        return $this->hasMany('App\GroupPost', 'id', 'postId');
    }
}
