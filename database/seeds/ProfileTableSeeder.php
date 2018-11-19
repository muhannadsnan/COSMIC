<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Profile::class, 10)->create();   

        $pro = Profile::find(1);
        $pro->_currencies()->sync([1,3]);
        $pro = Profile::find(5);
        $pro->_currencies()->sync([3]);
    }
}
