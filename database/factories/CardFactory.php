<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'front_text' => $faker->sentence,
        'front_image_url' => $faker->imageUrl(),
        'back_text' => $faker->jobTitle,
        'back_image_url' => $faker->imageUrl(),
    ];
});
