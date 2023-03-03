@extends('layouts.app')

@section('title', 'Login')

@section('css')
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/promo.css') }}" rel="stylesheet">
@endsection

@section('vite')
    @vite(['resources/css/app.css', 'resources/js/auth.js'])
@endsection

@section('content')
    @include('component.promo.top-menu')

    <div id="auth-form"></div>

@endsection
