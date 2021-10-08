@props([
    'placeholder'
])

<div x-data="{ value: '' }">
    <input 
        type="text" 
        x-model="value"
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => "h-full w-full py-0.5 px-0.5 border-transparent focus:outline-none focus:ring-1 focus:ring-purple-100 focus:bg-gray-50"]) }} 
        autocomplete="off"
        x-on:focus="$el.setAttribute('type', 'text')" 
        x-on:focusout="(value === '' ? $el.setAttribute('type', 'text') : $el.setAttribute('type', ''))" 
        >
</div> 