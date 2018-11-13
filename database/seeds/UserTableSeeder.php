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
        $usr = User::find(5);
        $usr->_accounts()->sync([2,3,6]);
    }
}
