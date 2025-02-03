@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="space-y-5">
        {{-- Header section --}}
        <section class="px-4 py-3 bg-white rounded-lg shadow-md">
            <p class="text-xl text-[#212529] font-semibold">Profil</p>
        </section>

        {{-- Main section --}}
        <section class="flex gap-5 flex-col lg:flex-row">
            <div class="lg:sticky lg:top-4 p-4 mx-auto w-full max-w-96 h-fit space-y-2 bg-white rounded-lg shadow">
                <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('assets/images/no-image.jpg') }}"
                    alt="Profile" class="w-full object-cover aspect-square rounded-lg">
                <p class="text-center text-xl font-semibold">{{ $user->name }}</p>
            </div>

            <div class="flex-1 max-w-5xl space-y-4">
                <div x-data @reload-page.window="window.location.reload()" class="p-4 bg-white shadow rounded-lg">
                    <livewire:user-resources.user-profile />
                </div>

                <div class="p-4 bg-white shadow rounded-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="p-4 bg-white shadow rounded-lg">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </section>
    </div>
@endsection
