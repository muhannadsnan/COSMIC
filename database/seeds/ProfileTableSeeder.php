<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Profile::class, 10)->create(); 
        
        $pro = Profile::create([
            'base_id' => 11, 'title' => '2018 Profile first part', 'code' => 'abc', 'startPeriodDate' => '2019-03-06', 'endPeriodDate' => '2019-03-07'
        ]); 

        $pro = Profile::find(1);
        $pro->_currencies()->sync([1,3]);
        // $pro = Profile::find(5);
        // $pro->_currencies()->sync([3]);
    }
}
