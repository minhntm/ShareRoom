<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public function roomType()
    {
        return $this->belongsTo('App\RoomType', 'room_type');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function bookmark()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function distances()
    {
        return $this->hasMany('App\Distance', 'room1_id');
    }

    public function nearby($distanceRange, $limit)
    {
        return $this->distances()->where('distance', '<=', $distanceRange)->offset(0)->limit($limit)->get();
    }
}
