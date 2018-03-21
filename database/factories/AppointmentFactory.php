<?php

use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
    return [
        //
        'date' => $faker->dateTime,
        'reason' => $faker->words,
    ];
});
