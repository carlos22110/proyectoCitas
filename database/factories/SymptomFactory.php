<?php

use Faker\Generator as Faker;

$factory->define(App\Symptom::class, function (Faker $faker) {
    return [
        //
        'description' => $faker->words,
    ];
});
