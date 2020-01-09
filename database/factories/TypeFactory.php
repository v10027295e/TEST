<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(App\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
