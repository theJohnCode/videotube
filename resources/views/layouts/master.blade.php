<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles
</head>

<body>
    @include('sweetalert::alert')

    @include('layouts.header')

    <main class="">
        @include('layouts.sidebar')

        <div class="content">
            @yield('content')
        </div>

    </main>


    @livewireScripts
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>
