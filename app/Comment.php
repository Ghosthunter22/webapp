<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'comment'
    ];

    //Many Comments per Post Relationship
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    //Many Comments per BasicUser Relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
