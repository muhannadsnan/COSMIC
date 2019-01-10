<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">

        <main class="window">
            <div class="px-2">
                <div class="row justify-content-center">
                    <div class="container-fluid col-12 my-2">
                        @if(trim($__env->yieldContent('card-header'))) 
                            <div class="card border-dark bg-default mb-3">
                                <div class="card-header border-dark text-dark">@yield('card-header')</div>
                                <div class="card-body">        
                                    @yield('content')
                                </div>
                            </div>
                        @else
                            @yield('content')
                        @endif
                    </div>
                </div>
            </div>
        </main>
        @yield('scripts')
    </div>
</body>
</html>