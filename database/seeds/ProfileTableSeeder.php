<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Profile::class, 10)->create();   
    }
}
