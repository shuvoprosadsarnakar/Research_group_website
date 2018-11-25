<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table = 'posttypes';
    public function post()
    {
        return $this->hasMany('App\Post', 'id', 'postId');
    }
}
