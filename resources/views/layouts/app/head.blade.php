<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="csrf-token" name="_token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'MixApi')</title>
    <link href="{{ asset('/css/fonts.css') }}" rel="stylesheet">
    @yield('css')
    @yield('vite')
</head>
<body>
