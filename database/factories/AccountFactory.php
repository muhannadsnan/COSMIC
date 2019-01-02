<?php

use Faker\Generator as Faker;
use App\Account;
 
$root = Account::create([
    'title' => 'الموجودات', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'الموجودات', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الموجودات', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]);
$sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الزبائن', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]);
$sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مسحوبات', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]);
$sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'المخزون', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); 
$sub1 = Account::create([
    'title' => 'الأموال', 'code' => 'abc', 'desc' => 'abc', 'isDefault' => true, 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]);
$sub1->_parents()->sync([$root->id]);