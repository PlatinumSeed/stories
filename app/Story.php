<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function fragments()
    {
        return $this->hasMany('App\Fragment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
