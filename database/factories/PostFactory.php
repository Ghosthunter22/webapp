<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post' => $faker->realText(),
        'posted_at' => $faker->dateTime(),
        'basic_user_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});

