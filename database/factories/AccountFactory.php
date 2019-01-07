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
$sub1 = Account::create([
    'title' => 'المشتريات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مرتجع المشتريات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مصاريف نقل المشتريات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الحسم المكتسب', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'صافي المبيعات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'المبيعات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مرتجع المبيعات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الحسم الممنوح', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'المصاريف', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'رواتب واجور', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'كهرباء وماء', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'هاتف وفاكس وانترنت', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'إكراميات وهدايا', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'نقل وانتقال', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'وقود ومحروقات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'صيانة وقطع غيار', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'قرطاسية ومطبوعات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'زيوت وشحوم', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مصاريف متفرقة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'الإيرادات', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'إيرادات مختلفة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'البضاعة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'بضاغة أول المدة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'بضاعة آخر المدة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'الميزانية', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'الأرباح والخسائر', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'المتاجرة', 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);