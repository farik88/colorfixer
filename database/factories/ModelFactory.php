<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    $mail = $faker->unique()->safeEmail;

    return [
        'name' => $faker->name,
        'email' => $mail,
        'email_token' => base64_encode($mail),
        'password' => $password ?: $password = bcrypt('secret'),
        'tmp_password' => 'secret',
        'remember_token' => str_random(10),
        'verified' => true
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'phone' => preg_replace('/[\D]+/', '', $faker->phoneNumber)
    ];
});

$factory->define(App\Car::class, function () {
    return [
        'number' => str_random()
    ];
});

$factory->define(App\Stage::class, function () {
    static $number;

    if (is_null($number) || $number > 9) {
        $number = 1;
    }

    return [
        'number' => $number++
    ];
});

$factory->define(App\Attachment::class, function (Faker $faker) {
    $types = ['photo', 'video'];
    $model = ['type' => $types[rand(0,1)]];

    if ($model['type'] === 'photo') {
        $model['name'] = $faker->imageUrl();
    } else {
        $model['name'] = 'https://www.w3schools.com/html/mov_bbb.mp4';
    }

    return $model;
});