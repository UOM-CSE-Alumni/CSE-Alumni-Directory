@extends('layouts.home-layout')

@section('title')
    Home | {{ config('app.name', 'Laravel') }}
@stop

@section('content')
    @include('includes.home-navbar')
    @include('home.login-form')
@stop