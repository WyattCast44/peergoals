<x-panel title="My Peers" :padding="false" icon="users">
                    
    <ul class="divide-y">
        @foreach ($peers as $peer)
            <li class="flex items-center px-2 py-1.5 space-x-2">
                <img src="{{ $peer->avatar_url }}" alt="{{ $peer->name }}'s avatar" class="w-6 h-6 rounded-full">
                <span class="truncate">{{ $peer->name }}</span>
            </li>
        @endforeach
    </ul>

</x-panel>