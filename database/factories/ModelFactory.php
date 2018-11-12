<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text 
    ];
});

$factory->define(App\Material::class, function (Faker $faker) {
    $groups = App\Group::all();
    return [
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'dimention_unit' => $faker->randomElement(['cm', 'in']),
        'weight_unit' => $faker->randomElement(['kg', 'g']),
        'group_id' => $faker->randomElement($groups)
    ];
});


/*
  >  php artisan migrate:refresh --seed

$faker->randomElement([1,2,3])
$faker-> randomNumber, randomDigit
$faker-> sentence, text, paragraph

*/