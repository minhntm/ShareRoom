<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = ['id'];

    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
