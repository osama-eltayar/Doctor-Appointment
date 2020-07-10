<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\PainType;
use Faker\Generator as Faker;

$factory->define(PainType::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->word
    ];
});
