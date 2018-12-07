<?php

use Illuminate\Database\Seeder;
use App\Base;

class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Base::class, 10)->create();

        // $cur = Base::find(1);
        // $cur->_profiles()->sync([1,2,3,4]);
        // $cur->_users()->sync([5]);
        // $cur->_entries()->sync([1,10]);
        // $cur = Base::find(5);
        // $cur->_profiles()->sync([1,2,3,4,5,6]);
        // $cur->_users()->sync([5]);
        // $cur->_entries()->sync([10,11]);
    }
}
