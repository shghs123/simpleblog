<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if(!Route::is('splash') )
            @include('nav.main_navigation')
        @endif

        <main>
            @yield('content')
        </main>

        @if(Route::is('splash') )
            @include('nav.footer')
        @endif
    </div>

    <script>
        $(function() {
            @if(session('success'))
                fireSuccessAlert("{{ session('success') }}")
            @endif

            @if(session('error'))
                fireSuccessAlert("{{ session('error') }}")
            @endif
        });
    </script>
</body>
</html>
