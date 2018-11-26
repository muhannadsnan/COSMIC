<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();

        $usr = User::find(1);
        $usr->_accounts()->sync([3,4,5]);
        $usr->_groups()->sync([1,3,4]);
        $usr->_clients()->sync([1,2,3]);
        $usr->_warehouses()->sync([1,2,5]);
        $usr->_entries()->sync([1,2,5]);
        // $usr->_currencies()->sync([4]);
        $usr = User::find(5);
        $usr->_accounts()->sync([2,3,6]);
        $usr->_groups()->sync([2,3,4,5]);
        $usr->_clients()->sync([7,8,9]);
        $usr->_warehouses()->sync([1,2,4,5,6]);
        $usr->_entries()->sync([1,4,6,7]);
        // $usr->_currencies()->sync([2]);
    }
}
