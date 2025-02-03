@props([
    'name' => 'modal',
    'open' => 'false',
    'maxWidth' => 'md',
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div x-data="{ open: {{ $open }} }" {{ '@' . $name }}.window="open = $event.detail == 'close' ? false : true" x-cloak
    x-show="open" x-trap.noscroll="open">
    <div class="z-[50] p-5 fixed inset-0 flex bg-black bg-opacity-30 backdrop-blur-sm overflow-y-auto">
        <div class="m-auto h-min relative p-6 w-full {{ $maxWidth }} bg-white rounded-md">
            <svg @click="open = false; $dispatch('reset-modal')" viewBox="0 0 20 20" fill="currentColor"
                class="absolute top-2 right-2 size-5 fill-gray-500 hover:fill-red-600 hover:cursor-pointer">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                    clip-rule="evenodd" />
            </svg>

            {{ $slot }}
        </div>
    </div>
</div>
