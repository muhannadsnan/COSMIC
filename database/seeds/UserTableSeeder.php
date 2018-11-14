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
        $usr->_customers()->sync([1,2,3]);
        $usr = User::find(5);
        $usr->_accounts()->sync([2,3,6]);
        $usr->_groups()->sync([2,3,4,5]);
        $usr->_customers()->sync([7,8,9]);
    }
}
