<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicUser extends Model
{
    //1 BasicUser - Many Posts Relationship
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    //1 BasicUser - Many Comments Relationship
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function profpic()
    {
        return $this->hasOne('App\Profpic');
    }
}
