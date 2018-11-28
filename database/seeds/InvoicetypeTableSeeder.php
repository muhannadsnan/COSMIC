<?php

use Illuminate\Database\Seeder;
use App\Invoicetype;

class InvoicetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Invoicetype::class, 5)->create();
    }
}
