<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    
    public function group()
    {
        return $this->belongsToMany('App\Group', 'membergroups', 'memberId', 'postId');
    }
}
