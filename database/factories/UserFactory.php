<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'type' => 'default', // 沒有填寫都是一般的使用者
        'remember_token' => str_random(10),
    ];
});

// 定義一個管理者的狀態
// 有可能我們會忘記,定義成常數(immutatable)
$factory->state(App\User::class, 'admin',[
    'type' => App\User::ADMIN_TYPE,
]);