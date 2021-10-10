<x-panel title="Manage Peer Requests" icon="user-plus" :padding="false">
   
    <ul class="p-3 divide-y">

        @forelse ($requests as $request)

            <li class="flex items-center px-2 py-1.5 justify-between">
                <div class="flex items-center space-x-2 truncate">
                    <img src="{{ $request->sender->avatar_url }}" alt="{{ $request->sender->name }}'s avatar" class="w-6 h-6 rounded-full">
                    <span class="inline-block truncate">{{ $request->sender->name }}</span>
                </div>
                
                <button wire:click="approve({{ $request->id }})" class="px-2 py-1 text-sm font-semibold text-gray-700 transition duration-75 bg-gray-200 border-transparent rounded hover:bg-gray-300 hover:shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-400 disabled:cursor-wait disable:text-gray-600 selection:bg-purple-300">
                    Approve
                </button>
            </li>

        @empty

            <li class="text-sm text-center text-gray-500 select-none">No open requests</li>

        @endforelse

    </ul>
   
</x-panel>