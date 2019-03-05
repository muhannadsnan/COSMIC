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
        Invoice::create([
            'payment_id' => 1, 'currency_id' => 2, 'profile_id' => 11, 'serial' => 100, 'title' => 'Test #100', 'desc' => 'Test invoice #100', 'client_acc' => 1, 'NType' => 2, 'NDate' => now(), 'ext_num' => '', 'int_num' => '', 'sum' => 0, 'remaining' => 0
        ]);
        Invoice::create([
            'payment_id' => 2, 'currency_id' => 4, 'profile_id' => 11, 'serial' => 101, 'title' => 'Test #101', 'desc' => 'Test invoice #101', 'client_acc' => 1, 'NType' => 2, 'NDate' => now(), 'ext_num' => '', 'int_num' => '', 'sum' => 0, 'remaining' => 0
        ]);
        Invoice::create([
            'payment_id' => 3, 'currency_id' => 5, 'profile_id' => 11, 'serial' => 102, 'title' => 'Test #102', 'desc' => 'Test invoice #102', 'client_acc' => 1, 'NType' => 2, 'NDate' => now(), 'ext_num' => '', 'int_num' => '', 'sum' => 0, 'remaining' => 0
        ]);

        $inv = Invoice::find(1);
        $inv->_clients()->sync([3,5,7,9]);
        $inv->_materials()->sync([3,4,5,6,7,8,9]);
        $inv->_users()->sync([1,9]);
        $inv->_accounts()->sync([2,8]);
        $inv->_entry()->sync([2]);
        $inv = Invoice::find(5);
        $inv->_clients()->sync([1,2,3,7]);
        $inv->_materials()->sync([3,5,7,9]);
        $inv->_users()->sync([5,9,20]);
        $inv->_accounts()->sync([8,9]);
        $inv->_entry()->sync([3]);
    }
}
