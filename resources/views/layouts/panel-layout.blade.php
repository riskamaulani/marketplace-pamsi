@extends('layouts.base-layout')

@section('title')
    <title>{{ Auth::user()->status->getLabelText() . ' | Pamsi - Marketplace' }}</title>
@endsection

@section('main_content')
    <!-- ======= Header ======= -->
    @include('components.panel-header')

    <!-- ======= Sidebar ======= -->
    @include('components.sidebar')

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('components.panel-footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
