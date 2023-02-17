@extends('layouts.app')

@section('title', 'Home Page')

@section('css')
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/promo.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('/plugins/bootstrap-5.0.2-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/promo.js') }}"></script>
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
        <div id="title_anim" class="title__wrapper">
            <h1 class="title__main">{{ env('APP_NAME') }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <h2 class="mt-4 mb-4 text-center fs-1">Let us tell you about project..</h2>
            <div class="info-block">
                <div class="content">
                    <span class="fw-bold">{{ env('APP_NAME') }}</span>
                    - is a huge collection of detailed information and community on the most popular franchises
                </div>
                <div class="preview rounded-circle overflow-hidden">
                    <img src="{{ asset('/sources/mando-with-grogu.jpg') }}" alt="">
                </div>
            </div>
            <div class="info-block__reverse">
                <div class="preview rounded-circle overflow-hidden">
                    <img src="{{ asset('/sources/vader.jpg') }}" alt="">
                </div>
                <div class="content">
                    <span class="fw-bold">{{ env('APP_NAME') }}</span>
                    - is a huge collection of detailed information and community on the most popular franchises
                </div>
            </div>
            <div class="info-block">
                <div class="content">
                    <span class="fw-bold">{{ env('APP_NAME') }}</span>
                    - is a huge collection of detailed information and community on the most popular franchises
                </div>
                <div class="preview rounded-circle overflow-hidden">
                    <img src="{{ asset('/sources/marvel.jpg') }}" alt="">
                </div>
            </div>
            <div class="info-block__reverse">
                <div class="preview rounded-circle overflow-hidden">
                    <img src="{{ asset('/sources/all-heroes.jpg') }}" alt="">
                </div>
                <div class="content">
                    <span class="fw-bold">{{ env('APP_NAME') }}</span>
                    - is a huge collection of detailed information and community on the most popular franchises
                </div>
            </div>
            <div class="divider-block">
                <div class="fs-2"><a class="nav-link" href="/login">This is the way</a></div>
                <img src="{{ asset('/sources/mandalorian.jpg') }}" alt="">
            </div>
        </div>
    </div>
@endsection
