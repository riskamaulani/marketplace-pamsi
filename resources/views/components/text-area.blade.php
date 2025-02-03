@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-myaccent focus:ring-myaccent rounded-md shadow-sm',
]) !!}>{{ $slot }}</textarea>
