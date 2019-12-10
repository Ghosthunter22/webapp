<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BasicUser;
use Faker\Generator as Faker;

$factory->define(BasicUser::class, function (Faker $faker) {
    return [
        'username' => $faker->userName(),
        'name' => $faker->name(),
        'email' => $faker->unique()->email(),
        'password' => $faker->password(),    ];
});
