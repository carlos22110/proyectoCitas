<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        //
        'date' => $faker->dateTime,
        'reason' => $faker->word,
        'patient_id' => factory('App\Patient')->create()->id,
        'doctor_id' => factory('App\Doctor')->create()->id
    ];
});
