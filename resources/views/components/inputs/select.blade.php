@props([
    //
])

<select {{ $attributes->merge(['class' => 'rounded focus:ring focus:border-purple-400 focus:outline-none focus:ring-opacity-50 focus:ring-purple-400 border-gray-400']) }} {{ $attributes }}>
    {{ $slot }}
</select>