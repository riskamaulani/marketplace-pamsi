@props(['text' => 'Masuk'])

<div class="p-5 w-full max-w-[400px] bg-white shadow-lg sm:rounded-lg overflow-hidden">
    <div class="space-y-2">
        <a href="/">
            <img class="mx-auto w-16" src="{{ asset('assets/images/pamsi-green.png') }}" alt="pamsi">
        </a>

        <h5 class="text-center text-[#012970] text-xl font-medium leading-6">
            {{ $text }}
        </h5>
    </div>

    <div class="w-full sm:max-w-md mt-3">
        {{ $slot }}
    </div>
</div>
