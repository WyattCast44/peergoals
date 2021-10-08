<div class="flex items-center w-full" x-data="{ type: 'password' }">
    <x-inputs.text x-bind:type="type" class="flex-1 rounded-r-none" {{ $attributes }} />
    <button type="button" x-on:click="type == 'password' ? type='text' : type='password'" class="p-3 text-gray-700 border-t border-b border-r border-gray-400 rounded-r select-none bg-gray-50 hover:bg-gray-100 hover:shadow-inner focus:border-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">
        <span x-show="type=='password'" class="flex items-center w-4 h-4">@svg('eye', 'w-4 h-4')</span>
        <span x-cloak x-show="type=='text'" class="flex items-center w-4 h-4">@svg('eye-off', 'w-4 h-4')</span>
    </button>
</div>