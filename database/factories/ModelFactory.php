<?php

use Faker\Generator as Faker;
use App\MatGuide;

$factory->define(App\MatGuide::class, function (Faker $faker) {
    return [               
        'title' => $faker->name,
        'desc' => $faker->text 
    ];
});
$factory->define(App\Group::class, function (Faker $faker) {
    $matGuide = MatGuide::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'mat_guide_id' => $faker->randomElement($matGuide)
    ];
});
$factory->define(App\Material::class, function (Faker $faker) {
    $matGuide = MatGuide::all()->pluck('id')->toArray();
    return [
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'dimention_unit' => $faker->randomElement(['cm', 'in']),
        'weight_unit' => $faker->randomElement(['kg', 'g']),
        'mat_guide_id' => $faker->randomElement($matGuide)
    ];
});


/*
  >  php artisan migrate:refresh --seed

$faker->randomElement([1,2,3])
$faker-> randomNumber, randomDigit
$faker-> sentence, text, paragraph

*/