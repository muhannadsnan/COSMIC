<?php

use Faker\Generator as Faker;
use App\Account;
 
$root = Account::create([
    'title_ar' => 'الموجودات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'الموجودات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'أراضي', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'عقارات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'أثاث', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'سيارات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title_ar' => 'الموجودات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'الزبائن', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'زبون', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'مدينون', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title_ar' => 'مسحوبات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'مسحوبات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title_ar' => 'المخزون', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'مخزون', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title_ar' => 'الأموال', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'الصندوق', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'المصروف', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'المطاليب', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'المطاليب الثابتة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'رأس المال', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'رأس مال الشريك', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'القروض', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
$sub1 = Account::create([
    'title_ar' => 'المطاليب المتداولة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'الموردون', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'موردون رقم 1', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
    $sub2 = Account::create([
        'title_ar' => 'دائنون مختلفون', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'صافي المشتريات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'المشتريات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'مرتجع المشتريات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'مصاريف نقل المشتريات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'الحسم المكتسب', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'صافي المبيعات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'المبيعات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'مرتجع المبيعات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'الحسم الممنوح', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'المصاريف', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'رواتب واجور', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'كهرباء وماء', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'هاتف وفاكس وانترنت', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'إكراميات وهدايا', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'نقل وانتقال', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'وقود ومحروقات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'صيانة وقطع غيار', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'قرطاسية ومطبوعات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'زيوت وشحوم', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'مصاريف متفرقة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'الإيرادات', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'إيرادات مختلفة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'البضاعة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'بضاغة أول المدة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
$sub1 = Account::create([
    'title_ar' => 'بضاعة آخر المدة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
////////////////////////////////////////////////
$root = Account::create([
    'title_ar' => 'الميزانية', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]);
$sub1 = Account::create([
    'title_ar' => 'الأرباح والخسائر', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
]); $sub1->_parents()->sync([$root->id]);
    $sub2 = Account::create([
        'title_ar' => 'المتاجرة', 'serial' => 0, 'code' => 'abc', 'desc' => 'abc', 'nType' => 'abc', 'profile_id' => null,
    ]); $sub2->_parents()->sync([$sub1->id]);