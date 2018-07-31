<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $guarded = ['id'];
    protected $table = 'room_types';

    public function rooms()
    {
        return $this->hasMany('App\Room', 'room_type');
    }
}
