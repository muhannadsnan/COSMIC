<?php

use Illuminate\Database\Seeder;
use App\Entryinfo;

class EntryinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Entryinfo::class, 10)->create();

        // $eni = Entryinfo::find(1);
        // $eni->_accounts()->sync([3,4,5]);
        // $eni = Entryinfo::find(5);
        // $eni->_accounts()->sync([3,4,5]);
    }
}
