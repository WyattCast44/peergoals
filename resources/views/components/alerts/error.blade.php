@props(['message'])

<div 
    x-data
    x-transition.duration.100ms
    class="px-2 py-1.5 mb-3 text-sm text-red-800 bg-red-100 rounded-sm flex items-center justify-between">
    <p>{{ $message }}</p>
    <button x-on:click="$root.remove()" type="button" class="flex items-center justify-center p-1 rounded hover:bg-red-200 hover:shadow-inner focus:outline-none focus:ring-2 focus:ring-red-300">
        <x-icon-x class="w-4 h-4" />
    </button>
</div>