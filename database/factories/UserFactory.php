<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => "user",
        'email' => 'user@gmail.com', //$2y$12$QbDu1X.nhAzO1M2ynNtW3uyjkuPSi09VijhQUkGGgbcvpm87U/1ju
        'password' => '$2y$12$QbDu1X.nhAzO1M2ynNtW3uyjkuPSi09VijhQUkGGgbcvpm87U/1ju', // password 12345678
        'type' => 1, //0 for admin and 1 for user
        'phone' => $faker->phoneNumber,
        'dob' => $faker->date,
        'address' => $faker->address,
        'profile' => Str::random(10) . '.jpg',
        'created_user_id' => 1,
        'updated_user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});