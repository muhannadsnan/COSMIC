<?php

use Faker\Generator as Faker;
use App\Account;
 
$root = Account::create([
    'title' => 'الموجودات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'الموجودات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'أراضي', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'عقارات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'أثاث', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'سيارات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'الموجودات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الزبائن', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'زبون', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'مدينون', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'مسحوبات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'مسحوبات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'المخزون', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'مخزون', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'الأموال', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'الصندوق', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'المصروف', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'المطاليب', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'المطاليب الثابتة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'رأس المال', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'رأس مال الشريك', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'القروض', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title' => 'المطاليب المتداولة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الموردون', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'موردون رقم 1', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title' => 'دائنون مختلفون', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'صافي المشتريات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'المشتريات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مرتجع المشتريات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مصاريف نقل المشتريات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الحسم المكتسب', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'صافي المبيعات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'المبيعات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مرتجع المبيعات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'الحسم الممنوح', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'المصاريف', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'رواتب واجور', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'كهرباء وماء', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'هاتف وفاكس وانترنت', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'إكراميات وهدايا', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'نقل وانتقال', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'وقود ومحروقات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'صيانة وقطع غيار', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'قرطاسية ومطبوعات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'زيوت وشحوم', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'مصاريف متفرقة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'الإيرادات', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'إيرادات مختلفة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'البضاعة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'بضاغة أول المدة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title' => 'بضاعة آخر المدة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title' => 'الميزانية', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]);
$sub1 = Account::create([
    'title' => 'الأرباح والخسائر', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title' => 'المتاجرة', 'serial' => 999, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null, 'currency_id' => 1
    ]); $sub2->_parents()->sync([$sub1->id]);