@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-myaccent focus:ring-myaccent rounded-md shadow-sm',
]) !!}>
