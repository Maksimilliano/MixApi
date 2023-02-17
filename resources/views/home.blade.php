@extends('layouts.app')

@section('title', 'Home Page')

@section('css')
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/promo.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('/plugins/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
@endsection

@section('content')
    <div class="top-menu">
        <div class="container">
            <ul class="nav justify-content-between pt-2 pb-2">
                <li class="nav-item"><a href="/" class="nav-link">Main Page</a></li>
                <li class="nav-item"><a href="/" class="nav-link">Sources</a></li>
                <li class="nav-item"><a href="/" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/" class="nav-link">Register</a></li>
            </ul>
        </div>
    </div>
    <div class="header d-flex align-items-center justify-content-center">
        <div class="title__wrapper">
            <h1 class="title__main">{{ env('APP_NAME') }}</h1>
        </div>
    </div>
    <div class="container">

    </div>
@endsection
