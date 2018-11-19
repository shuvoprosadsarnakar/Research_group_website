<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function groupPost()
    {
        return $this->belongsToMany('App\Post', 'groupposts', 'groupId', 'postId');
    }
}
