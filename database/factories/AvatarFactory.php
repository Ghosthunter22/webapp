<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Avatar;
use Faker\Generator as Faker;

$factory->define(Avatar::class, function (Faker $faker) {
    return [
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
