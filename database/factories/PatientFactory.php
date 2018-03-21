<?php

use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
    return [
        //
        'nuhsa' => $faker->randomNumber(8),
        'medicalHistory' => $faker->words,
        'DNI/NIF' => $faker->unique()->randomNumber(8),
        'address' => $faker->streetAddress
    ];
});
