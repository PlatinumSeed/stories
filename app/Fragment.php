<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fragment extends Model
{

    protected $fillable = [
        'content',
        'fragment_type_id',
        'user_id',
        'story_id',
        'fragment_type',
        'order',
    ];

    public function story()
    {
        return $this->belongsTo('App\Story');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
