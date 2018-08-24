<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function notification()
    {
        return $this->hasMany('App\Notification');
    }

    public function upvotes()
    {
        return $this->likes()->where('is_vote', 1);
    }

    public function downvotes()
    {
        return $this->likes()->where('is_vote', 0);
    }

    public function upvoteDownvoteSubtraction()
    {
        return count($this->upvotes) - count($this->downvotes);
    }
}
