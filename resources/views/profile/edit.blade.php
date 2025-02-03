@extends('layouts.admin')

@section('title', 'Profil')

@section('content')
    <div class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <h2 class="font-bold text-[#012970] text-3xl">Profil</h2>
    </div>

    <div class="max-w-5xl space-y-4">
        <div class="p-4 bg-white shadow sm:rounded-lg">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-4 bg-white shadow sm:rounded-lg">
            @include('profile.partials.update-password-form')
        </div>

        {{-- <div class="p-4 bg-white shadow sm:rounded-lg">
            @include('profile.partials.delete-user-form')
        </div> --}}
    </div>
@endsection
