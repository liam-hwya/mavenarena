<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use App\User;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'attend_date' => $faker->date(),
        'in_time' => $faker->time(),
        'out_time' => $faker->time(),
        'remark' => $faker->sentence
    ];
});
