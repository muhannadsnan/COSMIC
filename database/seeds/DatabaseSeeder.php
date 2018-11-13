<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ProfileTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(MatGuideTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
    }
}
