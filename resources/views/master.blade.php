<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">
        @include('partials.nav')

        <main class="master">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="container">
                        @if(trim($__env->yieldContent('card-header'))) 
                            <div class="card bg-default mb-3">
                                <div class="card-header">@yield('card-header')</div>
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

        @include('partials.footer') <!-- with scripts -->
    </div>
    
    <script src="{{ asset('js/app.js') }}" ></script>
    @yield('scripts')
</body>
</html>