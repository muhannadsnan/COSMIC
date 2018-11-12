<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(App\Material::class, 20)->create();        
    }
}
