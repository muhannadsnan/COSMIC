<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'title' => $faker->name
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'desc' => $faker->text 
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    $categories = App\Category::all();
    return [
        'title' => $faker->name,
        'desc' => $faker->text,
        'ext' => $faker->randomElement(['jpg', 'bmp', 'png', 'gif']),
        'cat_id' => $faker->randomElement($categories)
        // 'cat_id' => null
    ];
});


/*
  >  php artisan migrate:refresh --seed

$faker->randomElement([1,2,3])
$faker-> randomNumber, randomDigit
$faker-> sentence, text, paragraph

*/