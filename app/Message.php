<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'to'];

    public function user()
    {
        return $this->belongsTo('App\User', 'from');
    }
}
