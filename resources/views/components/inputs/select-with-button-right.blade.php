@props([
    'button'
])

<div class="flex items-center w-full">
    
    <x-inputs.select class="flex-1 rounded-r-none" {{ $attributes }}>
        {{ $slot }}
    </x-inputs.select>

    <button 
        type="button" 
        class="flex items-center justify-center p-3 text-gray-700 border-t border-b border-r border-gray-400 rounded-r select-none bg-gray-50 hover:bg-gray-100 hover:shadow-inner focus:border-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400" {{ $button->attributes }}>
            @svg($button->attributes->get('icon'), 'w-4 h-4')
    </button>
    
</div>