<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    OneTel Template
    http://www.templatemo.com/tm-468-onetel
    -->
    <!-- stylesheet css -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/nivo_themes/default/default.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/templatemo-style.css') }}">
    <!-- google web font css -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

</head>
<body>

@include('layouts.navbar')

@yield('content')

@include('layouts.footer')

<!-- javascript js -->
<script src="{{ URL::asset('js/jquery.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/nivo-lightbox.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>

@stack('js')

</body>
</html>


