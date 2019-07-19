<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.nav')
        <div class="container">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-4">
                    @include('inc.sidenav')
                </div>

                <div class="col-lg-8">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
                @endif
            </div>
        </div>

        @guest
        <main class="py-4">
            @yield('content')
        </main>   
        @endguest
    </div>
</body>
</html>
