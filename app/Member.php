<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    public $timestamps = false;
    
    public function group()
    {
        return $this->belongsToMany('App\Group', 'membergroups', 'memberId', 'postId');
    }

    public function post()
    {
        return $this->belongsToMany('App\Post', 'memberposts', 'memberId', 'postId');
    }
}
