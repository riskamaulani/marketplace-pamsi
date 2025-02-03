@props(['disabled' => false, 'items', 'selected' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-myaccent focus:ring-myaccent rounded-md shadow-sm',
]) !!}>
    @if ($items)
        @foreach ((array) $items as $item)
            <option value="{{ $item['value'] }}" {{ $item['value'] == $selected ? 'selected' : '' }}>
                {{ $item['name'] }}
            </option>
        @endforeach
    @endif
</select>
