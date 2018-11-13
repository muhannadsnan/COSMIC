<?php

use Illuminate\Database\Seeder;
use App\MatGuide;

class MatGuideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MatGuide::class, 5)->create();   
    }
}
