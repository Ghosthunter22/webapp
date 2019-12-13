<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {
    return [
        'phone' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'user_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
