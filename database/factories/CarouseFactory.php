<?php

use Faker\Generator as Faker;

$factory->define(App\Edward\Carouse\Carouse::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'src' => $faker->url
    ];
});
