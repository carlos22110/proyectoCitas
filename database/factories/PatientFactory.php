<?php

use Faker\Generator as Faker;

$factory->define(App\Patient::class, function (Faker $faker) {
    return [
        //
        'nuhsa' => $faker->randomNumber(8),
        'medicalHistory' => $faker->word,
        'user_id' => factory('App\User')->create()->id
    ];
});
