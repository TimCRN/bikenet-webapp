<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionUpdate extends Model
{
    public $bike;
    public $position;

    public function __construct($bike, $position)
    {
        $this->bike = $bike;
        $this->position = $position;
    }
}
