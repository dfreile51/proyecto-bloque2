<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $nombre }}</title>
    <script src="https://kit.fontawesome.com/6a5b02212e.js" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>

<body>
    @include('components.header')
    @yield('content-area')
    @include('discos.modals.modal-login')
    @include('discos.modals.modal-register')
    @include('components.footer')
    @yield('js')
</body>

</html>
