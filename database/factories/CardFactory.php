<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'front_text' => $faker->sentence,
        'back_text' => $faker->jobTitle,
    ];
});
