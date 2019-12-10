<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profpic;
use Faker\Generator as Faker;

$factory->define(Profpic::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'basic_user_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
