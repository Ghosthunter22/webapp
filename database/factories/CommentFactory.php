<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->realText(),
        'commented_at' => $faker->dateTime(),
        'basic_user_id' => $faker->numberBetween($min = 1, $max = 50),
        'post_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});

