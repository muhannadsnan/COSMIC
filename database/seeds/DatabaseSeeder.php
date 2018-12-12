<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() // don't mess with the order !!!!!!!!
    {
        // $this->call(ProfileTableSeeder::class);
        // $this->call(CurrencyTableSeeder::class);
        // $this->call(WarehouseTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BaseTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(WarehouseTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
        $this->call(EntryTableSeeder::class);
        $this->call(EntryinfoTableSeeder::class);
        $this->call(InvoiceinfoTableSeeder::class);
        $this->call(InvoicetypeTableSeeder::class);
    }
}
