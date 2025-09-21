<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Sign Up Form by Colorlib</title> --}}
    <title> Royal {{ $title ?? '' }}</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('/Auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('/Auth/css/style.css') }}">
    @livewireStyles
</head>
<body dir="rtl">

    {{-- <livewire:header/> --}}

    {{$slot}}

    {{-- <livewire:footer/> --}}

    <!-- JS -->
    <script src=" {{ asset('/Auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/Auth/js/main.js') }}"></script>
    @livewireScripts

</body>
