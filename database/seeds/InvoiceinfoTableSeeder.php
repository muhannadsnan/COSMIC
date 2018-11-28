<?php

use Illuminate\Database\Seeder;
use App\Invoiceinfo;

class InvoiceinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Invoiceinfo::class, 10)->create();
    }
}
