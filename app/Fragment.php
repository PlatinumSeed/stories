<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fragment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
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
