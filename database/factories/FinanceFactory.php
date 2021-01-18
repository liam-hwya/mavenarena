<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Finance;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Finance::class, function (Faker $faker) {
    return [
        'income' => $faker->randomNumber,
        'outcome' => $faker->randomNumber,
        'income_remark' => $faker->sentence,
        'outcome_remark' => $faker->sentence,
        
    ];
});
