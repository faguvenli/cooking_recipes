<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    <meta property="twitter:card" content="summary">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="Login | {{env('APP_NAME')}}">
    <meta property="twitter:description" content="PSI Gaming">
    <meta property="og:title" content="Login | {{env('APP_NAME')}}"/>
    <meta property="og:description" content="Login | {{env('APP_NAME')}}"/>
    <meta property='og:url' content='{{ url()->current() }}'/>
    <meta property='og:type' content='website'>
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes, maximum-scale=1">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="author" content="PSI Gaming">
    @stack('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.min.css') }}?v={{rand()}}">
    <link rel="stylesheet" href="{{ asset('assets/libs/fontawesome/css/all.min.css') }}"/>
</head>
<body>
<div class="container">
    <div class="left"></div>
    <div class="right">
        @yield('content')
    </div>
</div>
@stack('scripts')
</body>
</html>
