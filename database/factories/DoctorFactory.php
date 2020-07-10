<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    $specialties = ['Surgeon','Psychiatrist','Cardiologist','Dermatologist','General'];
    return [
        'specialty'=>$faker->randomElement($specialties),
    ];
});
