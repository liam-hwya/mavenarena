<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SalaryRecord;
use App\User;
use Faker\Generator as Faker;

$factory->define(SalaryRecord::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'month' => $faker->monthName,
        'remark' => $faker->sentence,
        'paid' => $faker->boolean
    ];
});
