<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';
    public function post(){
        return $this->belongsTo('App\Post','postId','id');
    }
}
