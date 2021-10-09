<x-panel title="Manage Peer Requests" icon="user-plus" :padding="false">
   
    <ul class="p-3 divide-y">

        @foreach ($requests as $request)

            <li class="flex items-center justify-between p-2">
                <p>{{ $request->sender->name }}</p>
                <button wire:click="approve({{ $request->id }})">Approve</button>
            </li>

        @endforeach

    </ul>
   
</x-panel>