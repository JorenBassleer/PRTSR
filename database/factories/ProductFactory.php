<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->domainWord,
        'slug' => $faker->unique()->slug,
        'details' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'storage' => $faker->randomDigit,
        'gender_id' => $faker->numberBetween(1, 3),
    ];
});
