<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{ 
    public function run()
    {
        factory(Client::class, 30)->create();   

        $client = Client::find(1);
        $client->_users()->sync([2,5,6,7]);
        $client->_invoices()->sync([2,5,6,7,11,15]);
        $client = Client::find(4);
        $client->_users()->sync([1,2,3,6,8,10]);
        $client->_invoices()->sync([2,5,9,11]);
    }
}
