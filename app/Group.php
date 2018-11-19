<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function post()
    {
        return $this->belongsToMany('App\Post', 'groupposts', 'groupId', 'postId');
    }

    public function member()
    {
        return $this->belongsToMany('App\Member', 'membergroups', 'groupId', 'memberId');
    }
}
