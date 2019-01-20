<?php use Faker\Generator as Faker;

$factory->define(App\Base::class, function (Faker $faker) { 
    $users = App\User::find([3,6,8,9])->pluck('id')->toArray();
    return [
        'title' => $faker->word,
        'accGuide' => $faker->randomElement([0,1]),
        'reqPass' => $faker->randomElement([0,1]),
        'user_id' => $faker->randomElement($users),
    ];
});
$factory->define(App\Profile::class, function (Faker $faker) {
    $bases = App\Base::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'startPeriodDate' => $faker->date,
        'endPeriodDate' => $faker->date,
        'base_id' => $faker->randomElement($bases),
    ];
});
$factory->define(App\Currency::class, function (Faker $faker) {
    return [               
        'title' => $faker->name,
        'country' => $faker->ean13,
        'NDate' => now(),
        'sell' => $faker->randomFloat(null, 0, 1000),
        'buy' => $faker->randomFloat(null, 0, 1000),
        'sell_black' => $faker->randomFloat(null, 0, 1000),
        'buy_black' => $faker->randomFloat(null, 0, 1000),
    ];
});
$factory->define(App\Account::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    $currencies = App\Currency::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        // 'isDefault' => false, >> deleted
        'nType' => $faker->randomElement(['N', 'C', 'A', 'D']),
        'profile_id' => $faker->randomElement($profiles),
        'currency_id' => $faker->randomElement($currencies),
        // 'currency_id' => $faker->randomElement($accounts),
    ];
});
$factory->define(App\Warehouse::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'desc' => $faker->text,
        'profile_id' => $faker->randomElement($profiles),
    ];
});
$factory->define(App\Group::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [               
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'profile_id' => $faker->randomElement($profiles),
    ];
});
$factory->define(App\Material::class, function (Faker $faker) {
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [
        'title' => $faker->name,
        'code' => $faker->ean13,
        'desc' => $faker->text,
        'dimention_unit' => $faker->randomElement(['cm', 'in']),
        'weight_unit' => $faker->randomElement(['kg', 'g']),
        'profile_id' => $faker->randomElement($profiles),
    ];
});
$factory->define(App\Client::class, function (Faker $faker) {
    $accounts = App\Account::all()->pluck('id')->toArray();
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [               
        'name' => $faker->name,
        'company_name' => $faker->company,
        'company_form' => $faker->word,
        'licsence_address' => $faker->address,
        'delivery_address' => $faker->address,
        'tax_num' => $faker->ean8,
        'tax_dept' => $faker->randomElement(['dept#1', 'dept#2', 'dept#3', 'dept#4']),
        'account_id' => $faker->randomElement($accounts),
        'profile_id' => $faker->randomElement($profiles),
    ];
});
$factory->define(App\Invoice::class, function (Faker $faker) { 
    $profiles = App\Profile::all()->pluck('id')->toArray();
    $currencies = App\Profile::all()->pluck('id')->toArray();
    $payments = App\Payment::all()->pluck('id')->toArray();
    return [ 
        'serial' => $faker->ean8,
        'title' => $faker->name,
        'desc' => $faker->sentence,
        'client_acc' => $faker->randomElement([1,2,3]), // 1=cash, 2=remaining, 3=xxx 
        'NType' => $faker->randomElement([1,2,3,4]), // 1=sell, 2=but, 3=returnSell, 4=returnBuy
        'ext_num' => $faker->ean8,
        'int_num' => $faker->ean8,
        'sum' => $faker->randomFloat(null, 0, 1000),
        'remaining' => $faker->randomFloat(null, 0, 1000),
        'profile_id' => $faker->randomElement($profiles),
        'currency_id' => $faker->randomElement($currencies),
        'payment_id' => $faker->randomElement($payments),
    ];
});
$factory->define(App\Entry::class, function (Faker $faker) { 
    $profiles = App\Profile::all()->pluck('id')->toArray();
    return [ 
        'nType' => $faker->randomElement([0,10,20,30]),
        'desc' => $faker->sentence,
        'debit' => $faker->randomFloat(null, 0, 10000),
        'credit' => $faker->randomFloat(null, 0, 10000),
        'equivalent' => $faker->randomFloat(null, 0, 10000),
        'profile_id' => $faker->randomElement($profiles),
    ];
});
$factory->define(App\Currency::class, function (Faker $faker) { 
    return [
        'sell' => $faker->randomFloat(null, 0, 10000),
        'buy' => $faker->randomFloat(null, 0, 10000),
        'sell_black' => $faker->randomFloat(null, 0, 10000),
        'buy_black' => $faker->randomFloat(null, 0, 10000),
        'NDate' => $faker->date(),
        'country' => $faker->country,
        'title' => $faker->currencyCode,
    ];
});
$factory->define(App\Entryinfo::class, function (Faker $faker) { 
    $currencies = App\Currency::all()->pluck('id')->toArray();
    $entries = App\Entry::all()->pluck('id')->toArray();
    return [
        'currency_id' => $faker->randomElement($currencies),
        'entry_id' => $faker->randomElement($entries),
        'd1' => $faker->word,
        'd2' => $faker->word,
    ];
});
// $factory->define(App\Invoiceinfo::class, function (Faker $faker) { 
//     return [
//         'd1' => $faker->word,
//         'd2' => $faker->word,
//     ];
// });
// $factory->define(App\Invoicetype::class, function (Faker $faker) { 
//     return [
//         'title' => $faker->sentence,
//     ];
// });
// $factory->define(App\Payment::class, function (Faker $faker) { 
//     return [
//         'title' => $faker->word,
//     ];
// });



/*
  >  php artisan migrate:refresh --seed

$faker->randomElement([1,2,3])
$faker-> randomNumber, randomDigit
$faker-> sentence, text, paragraph

*/