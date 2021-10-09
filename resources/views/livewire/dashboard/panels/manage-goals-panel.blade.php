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