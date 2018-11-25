<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    public function post()
    {
        return $this->belongsTo('App\Post','id','postId');
    }
}
