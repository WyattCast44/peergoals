<x-panel title="My Peers" :padding="false" icon="users">
                    
    <ul class="divide-y">

        @forelse ($peers as $peer)

            <li class="flex items-center px-2 py-1.5 space-x-2">
                <img src="{{ $peer->avatar_url }}" alt="{{ $peer->name }}'s avatar" class="w-6 h-6 rounded-full">
                <span class="truncate">{{ $peer->name }}</span>
            </li>
            
        @empty

            <li class="py-2 text-sm text-center text-gray-500 select-none">No peers yet</li>
        
        @endforelse
    </ul>

</x-panel>