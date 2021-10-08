<x-panel title="Manage Clients" icon="users">
    
    <ul class="divide-y">

        {{-- @forelse ($clients as $client)
            
            <li class="flex items-center justify-between py-2.5">
                
                <div class="text-gray-600">
                    <p class="truncate">{{ $client->name }}</p>
                    <p class="text-sm">{{ $client->email }}</p>
                </div>
                
                <div>
                    <x-buttons.ghost wire:click="deleteClient({{ $client->id }})">
                        Delete
                    </x-buttons.ghost>
                </div>
                
            </li>

        @empty

            <li class="py-3 text-lg text-center text-gray-500 select-none">No clients created yet</li>

        @endforelse --}}

    </ul>

</x-panel>    