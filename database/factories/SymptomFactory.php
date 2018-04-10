<?php

use Faker\Generator as Faker;

$factory->define(App\Symptom::class, function (Faker $faker) {
    return [
        //
        'description' => $faker->word,
        'patient_id' => factory('App\Patient')->create()->id
    ];
});
