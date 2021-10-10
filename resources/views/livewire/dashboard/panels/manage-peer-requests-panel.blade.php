<x-panel title="Manage Peer Requests" icon="user-plus" :padding="false">
   
    <ul class="p-3 divide-y">

        @forelse ($requests as $request)

            <li class="flex items-center justify-between p-2">
                <p>{{ $request->sender->name }}</p>
                <button wire:click="approve({{ $request->id }})">Approve</button>
            </li>

        @empty

            <li class="text-sm text-center text-gray-500 select-none">No open requests</li>

        @endforelse

    </ul>
   
</x-panel>