<?php

use Illuminate\Database\Seeder;
use App\Account;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Account::class, 20)->create();   
        
        // $acc = Account::find(1);
        // $acc->_closingAccount()->sync([3,5]);
        // $acc->_children()->sync([4,6]);
        // $acc->_users()->sync([3,5,7,9]);
        // $acc->_invoices()->sync([10,14,18]);
        // $acc->_entries()->sync([10,14,18]);
        // $acc = Account::find(5);
        // $acc->_closingAccount()->sync([1,2,3]);
        // // $acc->_children()->sync([1,2,4]);
        // $acc->_users()->sync([1,2,3,7]);
        // $acc->_invoices()->sync([20,22,10]);
        // $acc->_entries()->sync([20,22,10]);
    }
}
