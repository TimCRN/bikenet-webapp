<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionUpdate extends Model
{
    protected $hidden = [
        'id',
        'bike_id',
        'created_at',
        'updated_at'
    ];
}
