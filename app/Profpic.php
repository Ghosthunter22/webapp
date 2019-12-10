<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profpic extends Model
{
    public function basicUser()
    {
        return $this->belongsTo('App\BasicUser');
    }
}
