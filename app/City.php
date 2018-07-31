<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['id'];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function city()
    {
        return $this->belongsTo('App\Country');
    }
}
