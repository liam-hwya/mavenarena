<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use App\User;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'task' => $faker->sentence,
        'completed' => $faker->boolean
    ];
});
