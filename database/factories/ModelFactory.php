<?php use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'endPeriodDate' => $faker->date
    ];
});
$factory->define(App\Account::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'nType' => $faker->randomElement(['N', 'C', 'A', 'D']),
        'profile_id' => $faker->randomElement($profiles)
    ];
});
$factory->define(App\MatGuide::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'desc' => $faker->text,
        'profile_id' => $faker->randomElement($profiles)
    ];
});
$factory->define(App\Group::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    $matGuide = App\MatGuide::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'mat_guide_id' => $faker->randomElement($matGuide),
        'profile_id' => $faker->randomElement($profiles)
    ];
});
$factory->define(App\Material::class, function (Faker $faker) {
    $matGuide = App\MatGuide::all()->pluck('id')->toArray();
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'dimention_unit' => $faker->randomElement(['cm', 'in']),
        'weight_unit' => $faker->randomElement(['kg', 'g']),
        'mat_guide_id' => $faker->randomElement($matGuide),
        'profile_id' => $faker->randomElement($profiles)
    ];
});
$factory->define(App\Customer::class, function (Faker $faker) {
    return [               
        'name' => $faker->name,
        'company_name' => $faker->company,
        'company_form' => $faker->word,
        'licsence_address' => $faker->address,
        'delivery_address' => $faker->address,
        'tax_num' => $faker->ean8,
        'tax_dept' => $faker->randomElement(['dept#1', 'dept#2', 'dept#3', 'dept#4']),
    ];
});


/*
  >  php artisan migrate:refresh --seed

$faker->randomElement([1,2,3])
$faker-> randomNumber, randomDigit
$faker-> sentence, text, paragraph

*/