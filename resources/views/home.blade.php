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
    @include('component.promo.header')
    <div class="container">
        @include('component.promo.section_about')
    </div>
@endsection
