<?php

use Faker\Generator as Faker;

$factory->define(App\Edward\Posts\Post::class, function (Faker $faker) {
    return [
        'title' => $this->faker->sentence,
        'body' => $this->faker->sentence,
        'user_id' => factory(App\User::class)->create()->id
    ];
});
