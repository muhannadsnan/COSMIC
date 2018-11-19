<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() // don't mess with the order !!!!!!!!
    {
        $this->call(ProfileTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(WarehouseTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
        $this->call(EntryTableSeeder::class);
    }
}
