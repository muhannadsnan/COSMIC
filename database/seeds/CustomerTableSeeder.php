<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Customer::class, 30)->create();   
    }
}
