<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    public function post(){
        return $this->belongsTo('App\Post','postId','id');
    }
}
