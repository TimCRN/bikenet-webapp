<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionUpdate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'bike_id',
        'latitude',
        'longitude',
        'created_at'
    ];

    protected $hidden = [
        'id'        
    ];
}
