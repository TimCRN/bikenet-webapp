<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public $latitude;
    public $longitude;

    public function __construct($lat, $lon)
    {
        $this->latitude = $lat;
        $this->longitude = $lon;
    }
}
