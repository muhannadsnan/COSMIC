<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Customer::class, 30)->create();   

        $cust = Customer::find(1);
        $cust->_users()->sync([2,5,6,7]);
        $cust = Customer::find(4);
        $cust->_users()->sync([1,2,3,6,8,10]);
    }
}
