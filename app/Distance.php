<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $guarded = ['id'];

    public function room()
    {
        return $this->belongsTo('App\Room', 'room1_id');
    }
}
