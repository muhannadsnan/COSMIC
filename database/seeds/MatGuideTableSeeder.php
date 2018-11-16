<?php

use Illuminate\Database\Seeder;
use App\Warehouse;

class WarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Warehouse::class, 5)->create();   
    }
}
