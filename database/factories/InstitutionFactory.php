<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Institution;
use Faker\Generator as Faker;

$factory->define(Institution::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'enabled' => 1,
        'enabled_from' => now()->subDays(1),
        'enabled_to' => now()->addMonths(3),
    ];
});
