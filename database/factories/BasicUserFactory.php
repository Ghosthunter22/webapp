<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BasicUser;
use Faker\Generator as Faker;

$factory->define(BasicUser::class, function (Faker $faker) {
    return [
        'username' => $faker->userName(),
        'name' => $faker->userName(),
        'email' => $faker->unique()->email(),
        'email_verified_at' => now(),
        'password' => $faker->password(),
        'remember_token' => Str::random(10),    
    ];
});
