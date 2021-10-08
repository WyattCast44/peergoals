@props([
    'active',
    'label',
])

<option {{ active($active) ? 'selected' : '' }} {{ $attributes }}>
    {{ $label }}
</option>