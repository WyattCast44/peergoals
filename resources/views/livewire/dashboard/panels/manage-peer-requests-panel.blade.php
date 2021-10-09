<x-panel title="Manage Peer Requests" icon="user-plus" :padding="false">
   
    <ul class="p-3 divide-y">

        @foreach ($user->peer_requests as $request)

            <li class="p-2">
                {{ $request->sender->name }}
            </li>

        @endforeach

    </ul>
   
</x-panel>