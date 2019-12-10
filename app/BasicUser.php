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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
