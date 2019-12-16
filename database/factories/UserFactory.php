<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        // 'username' => $faker->userName(),
        'name' => $faker->userName(),
        'email' => $faker->unique()->email(),
        'email_verified_at' => now(),
        'password' => Hash::make(Str::random(8)),
        'remember_token' => Str::random(10),    
    ];
});
