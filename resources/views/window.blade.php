<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">

        <main class="window">
            <div class="col-sm-12 col-lg-9 col-xl-7 mx-auto my-2 px-2">
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
        </main>        
    </div>

    @yield('scripts')
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>