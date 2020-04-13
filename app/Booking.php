<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function bike()
    {
        return $this->hasOne('App\Bike');
    }

    protected $fillable = [
        'user_id',
        'bike_id',
        'start_position',
        'end_position'
    ];
}
