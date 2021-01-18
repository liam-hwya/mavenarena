<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Salary;
use App\User;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'position' => $faker->jobTitle,
        'amount' => $faker->randomNumber
    ];
});
