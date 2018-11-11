<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(App\Group::class, 5)->create();
        factory(App\Material::class, 20)->create();
        // factory(App\Category::class, 4)->create()->each(function($cat){
        //     $cat->products->save(factory(App\Product::class, 3)->create());
        // });

        // $this->call(UsersTableSeeder::class);
    }
}
