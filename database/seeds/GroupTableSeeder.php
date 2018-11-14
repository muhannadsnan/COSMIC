<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    public function run()
    {
        factory(Group::class, 5)->create();
        
        $gr = Group::find(1);
        $gr->_parents()->sync([3,5]);
        $gr->_children()->sync([2]);
        $gr->_users()->sync([1,3,6]);
        $gr = Group::find(5);
        $gr->_parents()->sync([1,2]);
        $gr->_children()->sync([4,3]);
        $gr->_users()->sync([1,5,6]);
    }
}
