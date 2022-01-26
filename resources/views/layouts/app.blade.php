<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <div class="jumbotron">
            <div class="container">
                <div>
                    <h5 class="text-white">Manage Event</h5>
                    <h3 class="text-white">SMK AL-BAHRI</h3>
                    <p class="text-white">
                        Jl. Yon Armed 7 No.143, RT.003/RW.0086, Cikiwul, Bantargebang, Kota Bks, Jawa Barat 17152
                    </p>
                </div>
            </div>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>