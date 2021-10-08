<x-panel title="Manage API Tokens" icon="tool">
    
    <ul class="divide-y">

        @forelse ($tokens as $token)
            
            <li class="flex items-center justify-between py-2.5">
                
                <div class="text-gray-600">
                    <p class="truncate">{{ $token->name }}</p>
                    <p class="text-sm">Created {{ $token->created_at->diffForHumans() }}</p>
                </div>
                
                <div>
                    <x-buttons.ghost wire:click="deleteToken({{ $token->id }})">
                        Delete
                    </x-buttons.ghost>
                </div>
                
            </li>

        @empty

            <li class="py-3 text-lg text-center text-gray-500 select-none">No tokens created yet</li>

        @endforelse

    </ul>

</x-panel>    