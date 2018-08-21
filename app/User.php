<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'owner_id');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function messages()
    {
        return $this->hasMany('App\Message', 'from');
    }
}
