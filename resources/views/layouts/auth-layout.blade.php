@extends('layouts.base-layout')

@section('title')
    <title>{{ $title ?? 'Pamsi - Marketplace' }}</title>
@endsection

@section('main_content')
    <main>
        @yield('content')
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
