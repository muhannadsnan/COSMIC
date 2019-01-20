<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
@if(@empty($noscript))
    <script src="{{ asset('js/app.js') }}" defer></script>
@endif
<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/png" href="{{asset('favico.png')}}"/>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@yield('styles') 


<script>
    window.Laravel = {!! json_encode([
        "api_token" => auth()->user()->api_token ?? '',
        "csrf_token" => csrf_token(),
        // "user_name" => auth()->user()->name ?? null
    ]) !!};
</script>