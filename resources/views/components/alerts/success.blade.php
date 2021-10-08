@props(['message'])

<div 
    x-data
    x-transition.duration.100ms
    class="px-2 py-1.5 mb-3 text-sm text-green-800 bg-green-100 rounded flex items-center justify-between border border-green-200">
    
    <p class="selection:bg-gray-200">{{ $message }}</p>

    <button 
        type="button" 
        x-on:click="$root.remove()" 
        class="flex items-center justify-center p-1 border-transparent rounded hover:bg-green-200 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-green-300">
        <x-icon-x class="w-4 h-4" />
    </button>

</div>