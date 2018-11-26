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
        factory(Currency::class, 6)->create();

        $cur = Currency::find(1);
        $cur->_profiles()->sync([1,2,3,4]);
        $cur->_users()->sync([5]);
        $cur->_entries()->sync([1,10]);
        $cur = Currency::find(5);
        $cur->_profiles()->sync([1,2,3,4,5,6]);
        $cur->_users()->sync([5]);
        $cur->_entries()->sync([10,11]);
    }
}
