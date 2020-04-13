<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function activeBooking()
    {
        return $this->bookings()->where('completed', '0');
    }

    public function position()
    {
        return $this->hasOne('App\PositionUpdate');
    }
}
