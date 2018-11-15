<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Currency::class, 4)->create();
    }
}
