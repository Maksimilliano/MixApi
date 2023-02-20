@extends('layouts.app')

@section('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection

@section('content')
    <div id="app"></div>
@endsection
