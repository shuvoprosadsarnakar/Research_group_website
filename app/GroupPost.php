<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPost extends Model
{
    protected $table = 'groupposts';

    public function post()
    {
        return $this->hasMany('App\Post','id','postId');
    }

    public function group()
    {
        return $this->belongsTo('App\Post','id','groupId');
    }
}
