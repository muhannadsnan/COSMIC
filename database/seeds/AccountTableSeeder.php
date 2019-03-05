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
        Account::create([
            'profile_id' => 11, 'serial' => 200, 'code' => 'code 200', 'title_ar' => 'Test #200', 'desc' => 'Test account # 200.', 'NType' => 'N', 'KType' => 'M', 'EType' => null, 'EVal' => 200, 'ECurrency' => 3
        ]);
        Account::create([
            'profile_id' => 11, 'serial' => 201, 'code' => 'code 201', 'title_ar' => 'Test #201', 'desc' => 'Test account # 201.', 'NType' => 'C', 'KType' => 'MD', 'EType' => 'D', 'EVal' => 201, 'ECurrency' => 4
        ]);
        Account::create([
            'profile_id' => 11, 'serial' => 202, 'code' => 'code 202', 'title_ar' => 'Test #202', 'desc' => 'Test account # 202.', 'NType' => 'D', 'KType' => 'D', 'EType' => 'M', 'EVal' => 202, 'ECurrency' => 5
        ]);
        
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
