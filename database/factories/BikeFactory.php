<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bike;
use Faker\Generator as Faker;

$factory->define(Bike::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'available' => true,
        'zoneId' => $faker->randomDigit

    ];
});
