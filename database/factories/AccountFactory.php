<?php

use Faker\Generator as Faker;
use App\Account;
 
$root = Account::create([
    'title' => 'الموجودات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'الموجودات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'أراضي', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'عقارات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'أثاث', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'سيارات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'الموجودات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الزبائن', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'زبون', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'مدينون', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'مسحوبات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'مسحوبات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'المخزون', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'مخزون', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'الأموال', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'الصندوق', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'المصروف', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'المطاليب', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'المطاليب الثابتة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'رأس المال', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'رأس مال الشريك', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'القروض', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'المطاليب المتداولة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الموردون', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'موردون رقم 1', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'دائنون مختلفون', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'صافي المشتريات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);