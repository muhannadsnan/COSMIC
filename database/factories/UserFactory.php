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
    $warehouses = App\Warehouse::all()->pluck('id')->toArray();
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt($faker->sentence()), // secret
        'remember_token' => str_random(10),
        'warehouse_id' => $faker->randomElement($warehouses),
        'profile_id' => $faker->randomElement($profiles)
    ];
});
