@extends('layouts.base')

@section('title', 'Login')

@section('body')
    <div class="min-h-svh flex items-center justify-center">
        <x-auth-card>
            @if ($errors->any())
                <div class="px-4 py-3 mb-4 text-sm rounded-lg bg-red-50">
                    <x-input-error :messages="['Login gagal! Cek kembali akun.']" class="font-medium" />
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email or Username -->
                <div>
                    <x-input-label for="input_type" :value="__('Email / Username')" />
                    <x-text-input id="input_type" class="block mt-1 w-full" type="text" name="input_type" :value="old('input_type')"
                        required autofocus autocomplete="input_type" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <div class="flex items-center justify-end mt-1">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-myaccent"
                                href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Remember Me -->
                <div @class(['block', 'mt-4' => !Route::has('password.request')])>
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-myaccent shadow-sm focus:ring-0" name="remember">
                        <span class="ms-2 text-sm text-gray-800">Ingat Saya</span>
                    </label>
                </div>


                <x-primary-button class="mt-4 w-full justify-center"><span
                        class="text-base text-white font-normal">Masuk</span></x-primary-button>

                <p class="mt-4 text-sm">Belum Punya Akun? <span>
                        <a class="text-sm text-black font-semibold hover:underline" href="{{ route('register') }}">
                            Buat Akun Sekarang
                        </a>
                    </span>
                </p>
            </form>
        </x-auth-card>
    </div>
@endsection
