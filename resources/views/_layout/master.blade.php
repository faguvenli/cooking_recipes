<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    <meta property="twitter:card" content="summary">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="@yield('title') | {{env('APP_NAME')}}">
    <meta property="twitter:description" content="@yield('meta_description')">
    <meta property="og:title" content="@yield('title') | {{env('APP_NAME')}}"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property='og:url' content='{{ url()->current() }}'/>
    <meta property='og:type' content='website'>
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#FFFFFF">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#FFFFFF">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes, maximum-scale=1">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="author" content="Yemek Tarifleri">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.min.css') }}?v={{rand()}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/splidejs/css/splide.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/fancybox/jquery.fancybox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}"/>

    @stack('styles')
    @livewireStyles
</head>
<body>
@include('_layout.partials.header')
@yield('content')
@include('_layout.partials.footer')
<script src="{{ asset('assets/js/app.min.js') }}?v={{rand()}}"></script>
<script src="{{ asset('assets/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/libs/splidejs/js/splide.min.js') }}"></script>
<script src="{{ asset('assets/libs/fancybox/jquery.fancybox.min.js') }}"></script>

@livewireScripts
<script src="{{ asset('assets/libs/alpinejs/cdn.js') }}" defer></script>
@stack('stacked_scripts')
</body>
</html>
