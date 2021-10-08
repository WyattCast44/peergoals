@props([
    'type' => 'text'
])

<input type="{{ $type }}" {{ $attributes->merge(['class' => 'rounded border-gray-400 focus:border-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400']) }} {{ $attributes }}>