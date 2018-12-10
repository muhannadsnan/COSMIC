<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">
        @include('partials.nav')

        <main class="">
            <div class="container py-4">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="card bg-default mb-3">
                            @if(trim($__env->yieldContent('card-header'))) <div class="card-header">@yield('card-header')</div> 
                            @else <div class="card-header">@yield('title')</div>  @endif
                            <div class="card-body">        
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer') <!-- with scripts -->
    </div>
</body>
</html>