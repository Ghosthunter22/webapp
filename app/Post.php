<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //1 Post - Many Comments Relationship
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    //Many Posts per User Relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
