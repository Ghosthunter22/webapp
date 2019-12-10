<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Many Comments per Post Relationship
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    //Many Comments per BasicUser Relationship
    public function basicUser()
    {
        return $this->belongsTo('App\BasicUser');
    }
}
