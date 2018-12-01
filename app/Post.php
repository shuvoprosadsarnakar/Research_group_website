<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    

    public function postType()
    {
        return $this->belongsTo('App\PostType', 'typeId', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Image', 'postId', 'id');
    }

    public function video()
    {
        return $this->hasMany('App\Video', 'postId', 'id');
    }

    public function reference()
    {
        return $this->hasMany('App\Reference', 'postId', 'id');
    }

    public function group()
    {
        return $this->belongsToMany('App\Group', 'groupposts', 'postId', 'groupId');
    }

    public function member()
    {
        return $this->belongsToMany('App\Member', 'memberposts', 'postId', 'memberId');
    }

}
