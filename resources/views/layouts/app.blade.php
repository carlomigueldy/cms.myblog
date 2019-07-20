<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inc.nav')
        <div class="container">
            <div class="row">
                @if(Auth::check())
                <div class="col-lg-2">
                    @include('inc.sidenav')
                </div>

                <div class="col-lg-10">
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>
</body>
</html>
