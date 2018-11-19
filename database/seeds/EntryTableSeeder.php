<?php

use Illuminate\Database\Seeder;
use App\Entry;

class EntryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Entry::class, 40)->create();

        $ent = Entry::find(1);
        $ent->_users()->sync([2,3,6,7,9]);
        $ent->_warehouses()->sync([1,6,8]);
        $ent->_accounts()->sync([1,6,8]);
        $ent = Entry::find(5);
        $ent->_users()->sync([2,7,8,11]);
        $ent->_warehouses()->sync([2,3,7,8,10]);
        $ent->_accounts()->sync([2,3,7,8,10]);
    }
}
