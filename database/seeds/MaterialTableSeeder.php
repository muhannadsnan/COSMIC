<?php

use Illuminate\Database\Seeder;
use App\Material;

class MaterialTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Material::class, 20)->create();   
        
        $mat = Material::find(1);
        $mat->_groups()->sync([3,5]);
        $mat = Material::find(5);
        $mat->_groups()->sync([1,2]);
    }
}
