<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function getFirstImageUrl()
    {
        return '/images/' . $this->photos()->get()[0]->filename;
    }

    public function rating()
    {
        $reviews= $this->reviews()->get();
        if (count($reviews) === 0) {
            return 0.0;
        } else {
            $star= 0.0;
            foreach ($reviews as $review) {
                $star = $star + $review->star;
            }
            return $star / count($reviews);
        }
    }

    public function notAvailable($start_date, $end_date)
    {
        // $not_available = $this->reservations->where(function($query) {
        //     $query->where($start_date, '<=', 'start_date')->where('start_date', '<=', $end_date);
        // })->orWhere(function($query) {
        //     $query->where($start_date, '<=', 'end_date')->where('end_date', '<=', $end_date);
        // })->orWhere(function($query) {
        //     $query->where('start_date', '<', $start_date)->where($end_date, '<', 'end_date');
        // })->limit(1)->get();

        $not_available = DB::select( DB::raw("SELECT * FROM reservations WHERE ((:start1 <= start_date AND start_date <= :end1) OR (:start2 <= end_date AND end_date <= :end2) OR (start_date < :start3 AND :end3 < end_date))"), 
        [
            'start1' => $start_date,
            'end1' => $end_date,
            'start2' => $start_date,
            'end2' => $end_date,
            'start3' => $start_date,
            'end3' => $end_date,
        ]);

        return $not_available;
    }
}
