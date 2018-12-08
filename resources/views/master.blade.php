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
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        <footer class="row justify-content-center w-100">
            msn-23@live.com
        </footer>
    </div>
</body>
</html>