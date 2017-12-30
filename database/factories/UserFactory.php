<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Ads::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(10),
        'image_1' => '/uploads/p2.png',
        'image_2' => '/uploads/p2.png',
        'image_3' => '/uploads/p2.png',
        'image_4' => '/uploads/p2.png',
        'type' => 1,
        'price' => $faker->randomDigitNotNull,
        'desc' => $faker->realText(300),
        'views' => 0,
        'city' => 'Reyad',
        'category_id' => 2,
        'user_id' => 2
    ];
});

$factory->define(App\Request::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(10),
        'desc' => $faker->realText(300),
        'user_id' => 2
    ];
});
