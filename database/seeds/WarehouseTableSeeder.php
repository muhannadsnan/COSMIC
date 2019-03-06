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
        factory(Warehouse::class, 15)->create();  
        
        $ware = Warehouse::find(1);
        $ware->_groups()->sync([1,3,4]);
        $ware->_materials()->sync([3,4,5]);
        $ware->_users()->sync([1,2,3]);
        // $ware = Warehouse::find(5);
        // $ware->_groups()->sync([2,3,4,5]);
        // $ware->_materials()->sync([2,3,6]);
        // $ware->_users()->sync([7,8,9]);
    }
}
