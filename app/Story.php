<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function fragments()
    {
        return $this->hasMany('App\Fragment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
