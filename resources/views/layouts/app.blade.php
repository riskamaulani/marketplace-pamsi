@extends('layouts.base')

@section('body')
    <div class="min-h-svh flex gap-4 flex-col justify-between">
        <div class="space-y-4">
            {{-- Navigation --}}
            @include('layouts.app-navigation')

            {{-- Content --}}
            <main class="px-5">
                <div class="mx-auto max-w-7xl">
                    @yield('content')
                </div>
            </main>
        </div>

        {{-- footer --}}
        <footer class="bg-[#c1c1c1]">
            <p class="px-5 py-4 text-[#212529] text-center">© 2024 Copyright: <a href="/"
                    class="underline hover:no-underline">PAMSI
                    Marketplace</a></p>
        </footer>
    </div>
@endsection
