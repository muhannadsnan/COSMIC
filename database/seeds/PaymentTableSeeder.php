<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Payment::class, 5)->create();
        Payment::create([
            'title' => 'كاش'
        ]);
        Payment::create([
            'title' => 'آجل'
        ]);
        Payment::create([
            'title' => 'سند قبض'
        ]);
    }
}
