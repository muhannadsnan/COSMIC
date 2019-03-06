<?php

use Illuminate\Database\Seeder;
use App\Invoice;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Invoice::class, 30)->create();
        
        $inv = Invoice::create([
            'payment_id' => 1, 'currency_id' => 2, 'profile_id' => 11, 'serial' => 100, 'title' => 'Test #100', 'desc' => 'Test invoice #100', 'client_acc' => 1, 'NType' => 2, 'NDate' => now(), 'ext_num' => '', 'int_num' => '', 'sum' => 0, 'remaining' => 0
        ]);  
        $inv->_warehouses()->sync([2]);
        $inv->_clients()->sync([2]);
        $inv->_currency = 2;
        $inv->_payment = 2;
        $inv = Invoice::create([
            'payment_id' => 2, 'currency_id' => 4, 'profile_id' => 11, 'serial' => 101, 'title' => 'Test #101', 'desc' => 'Test invoice #101', 'client_acc' => 1, 'NType' => 2, 'NDate' => now(), 'ext_num' => '', 'int_num' => '', 'sum' => 0, 'remaining' => 0
        ]);  
        $inv = Invoice::create([
            'payment_id' => 3, 'currency_id' => 5, 'profile_id' => 11, 'serial' => 102, 'title' => 'Test #102', 'desc' => 'Test invoice #102', 'client_acc' => 1, 'NType' => 2, 'NDate' => now(), 'ext_num' => '', 'int_num' => '', 'sum' => 0, 'remaining' => 0
        ]);        
    }
}
