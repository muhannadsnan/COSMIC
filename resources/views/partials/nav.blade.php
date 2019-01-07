<nav class="navbar navbar-expand-md navbar-primary navbar-laravel">
    <div class="container">
        {{-- <img src="xxx" class="d-inline-block align-top"/> --}}
        <a class="navbar-brand mb-0 h1" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav nav-pills {{__('lbl.m2-auto')}}" id="NAVBAR">
                <li class="nav-item">
                    <?php
                    $items = [
                        'جديد' => '#href',
                        'إعداد الصفحة' => '#href',
                        'divider',
                        'معلومات' => '#href',
                        'divider',
                    ];
                    if(@count(session('app.base')->_profiles) > 0){
                        foreach(session('app.base')->_profiles as $prof){
                            $new[$prof->title] = "/bases/".session('app.base')->id."/profiles/".$prof->id;
                        }
                        $items = array_merge($items, $new); //dd($items);
                    }
                    ?>
                    @dropdown([
                        'items' => $items
                    ])  {{__('lbl.profile.1')}}  @enddropdown
                </li>
                <!-- If in bases.show then hide other dropdowns -->
                @if(Route::currentRouteName() != 'bases.show')
                    <li class="nav-item">
                        @dropdown([
                            'items' => [
                                'مشتريات' => '#href',
                                'مبيعات' => '#href',
                                'مرتجع مشتريات' => '#href',
                                'مرتجع مبيعات' => '#href',
                                'divider',
                                'مرتجع من فاتورة' => '#href',
                                'divider',
                                'بضاعة اول المدة' => '#href',
                                'بطاقة تكاليف المواد' => '#href',
                                'لائحة التعبئة' => '#href',
                                'divider',
                                'عملية مناقلة' => '#href',
                                'عملية مناقلة بقيد' => '#href',
                                'divider',
                                'مصاريف الاعتماد وطرق توزيعها' => '#href',
                                'بطاقة اعتماد مستند رئيسي' => '#href',
                                'الاعتمادات المستندية' => '#href',
                                'دليل الاعتمادات المستندية' => '#href',
                                'submenu1' => [
                                    'ادوات',
                                    'تجميع الفواتير حسب الزبائن' => '#href',
                                    'نسخ الفواتير' => '#href',
                                    'الوارد اولاً الصادر اولاً' => '#href',
                                    'طباعة عدة فواتير' => '#href',
                                    'نقل حركة مستودع' => '#href',
                                    'مبيعات مستودع' => '#href',
                                    'لوائح التعبئة لزبون' => '#href',
                                    'divider',
                                    'نسخ مواد مستورع' => '#href',
                                ],
                            ]
                        ])  {{__('lbl.invoice.1')}}  @enddropdown
                    </li>
                    <li class="nav-item">
                        @dropdown([
                            'items' => [
                                'سند قيد' => '#href',
                                'divider',
                                'القيد الافتتاحي' => '#href',
                                'سند قبض' => '#href',
                                'سند دفع' => '#href',
                                'سند يومية' => '#href',
                                'divider',
                                'تحصيل الاوراف التجارية' => '#href',
                                'التحقق من حسابات الاوراق التجارية وبطاقتها' => '#href',
                                'الاوراق التجارية المستحقة' => '#href',
                                'حركى الاوراق التجارية المستحقة' => '#href',
                                'divider',
                                'طباعة عدة سندات' => '#href',
                            ]
                        ])  {{__('lbl.bond.0')}}  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [
                                'بطاقة زبون/مورد' => '#href',
                                'دليل الزبائن' => '#href',
                                'divider',
                                'كشف حساب زبون' => '#href',
                                'كشف حساب زبون لعدة سنوات' => '#href',
                                'أرصدة الزبائن' => '#href',
                                'لائحة الزبائن' => '#href',
                                'divider',
                                'الزبائن الاكثر حركة' => '#href',
                                'الزبائن الجدد' => '#href',
                                'divider',
                                'حركة الزبائن حسب السندات' => '#href',
                                'حركة الزبائن حسب الفواتير' => '#href',
                                'الحركة الشهرية للزبائن' => '#href',
                                'divider',
                                'ملخص استحقاقات الذمم' => '#href',
                                'الفواتير المستحقة' => '#href',
                                'submenu1' => [
                                    'ادوات',
                                    'حجب/إلغاء زبائن' => '#href',
                                    'ربط الدفعات' => '#href',
                                ],
                            ]
                        ])  {{__('lbl.customer.0')}}  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [
                                'بطاقة مادة' => '#href',
                                'بطاقة مجموعة' => '#href',
                                'دليل المواد' => '#href',
                                'divider',
                                'بطاقة مستودع' => '#href',
                                'دليل مستودعات' => '#href',
                                'divider',
                                [
                                    'تقارير الحركة',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير الجرد',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير الارباح',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير تحليلية',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير تقاطعية',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير الارقام التسلسلية',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير الاعمار',
                                    'sss' => '#href',
                                ],
                                [
                                    'تقارير رقابية',
                                    'sss' => '#href',
                                ],
                                'divider',
                                [
                                    'العروض الخاصة',
                                    'sss' => '#href',
                                ],
                                'divider',
                                [
                                    'ادوات',
                                    'sss' => '#href',
                                ],
                            ]
                        ])  {{__('lbl.material.0')}}  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [
                                'بطاقة حساب' => '#href',
                                'دليل الحسابات' => '/accounts',
                                'divider',
                                'دفتر الاستاذ' => '#href',
                                'دفتر الاستاذ لعدة سنوات' => '#href',
                                'دفتر اليومية' => '#href',
                                'divider',
                                'ميزان المراجعة' => '#href',
                                'أرصدة الحسابات' => '#href',
                                'حركة حساب' => '#href',
                                'ميزان مراجعة سنوي' => '#href',
                                'divider',
                                [
                                    'العملات',
                                    'أسعار الصرف' => '#href',
                                    'نشرة أسعار العملات' => '#href',
                                    'divider',
                                    'دفتر أستاذ عملة' => '#href',
                                    'فروقات أسعار الصرف' => '#href',
                                    'divider',
                                    'ميزان العملات' => '#href',
                                ],
                                'divider',
                                [
                                    'الموازنة',
                                    'بطاقة موازنة حساب' => '#href',
                                    'تقرير الموازنة التقديرية لحساب' => '#href',
                                    'تقرير الحسابات و الموازنات' => '#href',
                                    'بطاقة موازنة مركز كلفة' => '#href',
                                    'divider',
                                    'كشف الموازنة' => '#href',
                                ],
                                'divider',
                                'ضريبة القيمة المضافة من السندات' => '#href',
                                'نسبة التحصيل' => '#href',
                                'أعمار الذمم' => '#href',
                                'الحسابات الراكدة' => '#href',
                                'divider', 
                                [
                                    'الحسابات الختامية',
                                    'الميزانية' => '#href',
                                    'الارباح والخسائر' => '#href',
                                    'المتاجرة' => '#href',
                                ],
                                'الحسابات المطابقة' => '#href',
                                'divider',
                                [
                                    'ادوات',
                                    'إعادة ترميز الحسابات' => '#href',
                                    'توزيع الدفعات على الفترات الشهرية' => '#href',
                                    'نفل حركة حساب' => '#href',
                                    'divider',
                                    'تسوبة وتقريب أرصدة الحسابات' => '#href',
                                    'أرقام السجلات المفقودة' => '#href',
                                    'divider',
                                    'مطابقة رصيد حساب' => '#href',
                                ],
                            ]
                        ])  {{__('lbl.account.0')}}  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [ 
                                [
                                    'القوائم المالية',
                                    'قائمة الدخل' => '#href', 
                                    'قائمة حقوق الملكية' => '#href', 
                                    'قائمة المركز المالي - المالية' => '#href', 
                                    'قائمة التدفق النقدي' => '#href', 
                                ],
                                'بطاقة تفصيل التبويب' => '#href',
                                'ميزان المراجعة المصنف' => '#href',
                                'divider',
                                'الحركة النقدية حسب المقابلات' => '#href', 
                            ]
                        ])  مالية  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [ 
                                'a1' => '#href',
                                'a2' => '#href',
                                [
                                    'ccc',
                                    'c1'  => '#href',
                                    'c2' => '#href',
                                    'c3' => '#href',
                                ],
                                'divider',
                                'b1' => '#href',
                                'b2' => '#href',
                            ]
                        ])  تصنيع  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [
                                'بطاقة مركز كلفة' => '#href',
                                'دليل مراكز الكلفة' => '#href',
                                'divider',
                                'استاذ مركز كلفة' => '#href',
                                'ميزان مركز كلفة' => '#href',
                                'ميزان مراجعة مركز الكلف' => '#href',
                                'ميزان المراجعة السنوي لمراكز الكلف' => '#href',
                                'مراكز الكلفة الاكثر حركة' => '#href',
                            ]
                        ])  مراكز  @enddropdown
                    </li>
                    <li class="nav-item ">
                        @dropdown([
                            'items' => [
                                'نافذة المعلومات' => '#href',
                                'نافذة الصورة' => '#href',
                                'نافذة الرسائل' => '#href',
                                'نافذة الملخصات' => '#href',
                                'نافذة المكافآت' => '#href',
                                'نافذة التسجيل' => '#href',
                                'divider',
                                [
                                    'مظهر البرنامج',
                                    'XXX' => '#href',  
                                ],
                                [
                                    'شريط الادوات',
                                    'الرئيسي' => '#href',  
                                    'الفروع' => '#href',  
                                    'التاريخ' => '#href',  
                                ], 
                                'divider',
                                'إغلاق جميع النوافذ' => '#href',
                            ]
                        ])  إطار  @enddropdown
                    </li> 
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav  {{__('lbl.m1-auto')}}">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('lbl.login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('lbl.signup') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('bases') }}">{{__('lbl.base.0')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('lbl.logout') }} </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>