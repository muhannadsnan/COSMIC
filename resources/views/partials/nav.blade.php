<nav class="navbar navbar-expand-md navbar-primary navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav nav-pills {{__('lbl.m2-auto')}}" id="NAVBAR">
                <li class="nav-item">
                    @dropdown([
                        'items' => [
                            'جديد' => '#href',
                            'إعداد الصفحة' => '#href',
                            'divider' => '',
                            'معلومات' => '#href',
                            'divider' => '',
                            'ملف 1' => '#href',
                            'ملف 2' => '#href',
                            'ملف 3' => '#href',
                        ]
                    ])  {{__('lbl.profile.1')}}  @enddropdown
                </li>
                <li class="nav-item">
                    @dropdown([
                        'items' => [
                            'submenu1' => [
                                'فواتير',
                                'مشتريات' => '#href',
                                'مبيعات' => '#href',
                                'مرتجع مشتريات' => '#href',
                                'مرتجع مبيعات' => '#href',
                                'هدايا' => '#href',
                            ],
                        ]
                    ])  {{__('lbl.invoice.1')}}  @enddropdown
                </li>
                <li class="nav-item">
                    @dropdown([
                        'items' => [
                            'item1' => '#href',
                            'item2' => '#href',
                            'divider',
                            'item3' => '#href',
                        ]
                    ])  {{__('lbl.bond.0')}}  @enddropdown
                </li>
                <li class="nav-item ">
                    @dropdown([
                        'items' => [
                            'item1' => '#href',
                            'item2' => '#href',
                            'divider',
                            'item3' => '#href',
                        ]
                    ])  {{__('lbl.customer.0')}}  @enddropdown
                </li>
                <li class="nav-item ">
                    @dropdown([
                        'items' => [
                            'بطاقة مادة' => '#href',
                            'بطاقة مجموعة' => '#href',
                            'دليل المواد' => '#href',
                            'divider' => '',
                            'بطاقة مستودع' => '#href',
                            'دليل مستودعات' => '#href',
                            'divider' => '',
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
                            'divider' => '',
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
                            'item1' => '#href',
                            'item2' => '#href',
                            'divider',
                            'item3' => '#href',
                        ]
                    ])  {{__('lbl.account.0')}}  @enddropdown
                </li>
                <li class="nav-item ">
                    @dropdown([
                        'items' => [
                            'item1' => '#href',
                            'item2' => '#href',
                            'divider',
                            'item3' => '#href',
                        ]
                    ])  {{__('lbl.instruction.0')}}  @enddropdown
                </li>
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