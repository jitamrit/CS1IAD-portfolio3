<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

        <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.js') }}"></script>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
       
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="">
        <div class="">


            <div class="">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
