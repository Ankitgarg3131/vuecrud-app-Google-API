<?php

use Faker\Generator as Faker;

$factory->define(App\Map::class, function (Faker $faker) {
    return [
             'name' =>$faker->country,
            'latitude' =>$faker->latitude,
            'longitude' =>$faker->longitude
    ];
});
