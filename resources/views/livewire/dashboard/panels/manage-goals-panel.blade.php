<x-panel title="Manage Goals" icon="target">
    
    <ul class="space-y-5 divide-y">

        @forelse ($goals as $goal)
            
            <li class="flex items-center justify-between py-2.5 space-x-4">
                
                <div class="space-y-2 text-gray-600">
                    <div>
                        {{ $goal->body }}
                    </div>           
                    <div class="relative z-0 flex -space-x-1 overflow-hidden">
                        @foreach ($goal->peers as $peer)
                            <img class="relative z-[{{ $loop->index + 1 }}] inline-block w-6 h-6 rounded-full ring-2 ring-white" src="{{ $peer->avatar_url }}" alt="{{ $peer->name }}'s avatar" title="{{ $peer->name }}">
                        @endforeach
                        {{-- <img class="relative z-20 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        <img class="relative z-10 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                        <img class="relative z-0 inline-block w-6 h-6 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> --}}
                      </div>
                </div>
                
                <div>
                    <x-buttons.ghost wire:click="deleteGoal({{ $goal->id }})">
                        Delete
                    </x-buttons.ghost>
                </div>              
                
            </li>

        @empty

            <li class="py-3 text-lg text-center text-gray-500 select-none">No goals created yet</li>

        @endforelse

    </ul>

</x-panel>   