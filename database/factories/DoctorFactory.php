<?php

use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        //
        'speciality' => $faker->word,
    ];
});
