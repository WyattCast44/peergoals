<x-panel title="Manage Goals" icon="target">
    
    <ul class="space-y-5 divide-y">

        @forelse ($goals as $goal)
            
            <li class="flex flex-col md:flex-row items-center justify-between py-2.5 md:space-x-4 transition duration-100 ease-out" x-data>
                
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
                
                <div class="flex items-center justify-end w-full space-x-2 md:justify-start">

                    <x-buttons.ghost x-on:click="window.fireCannon($event);$wire.markComplete({{ $goal->id }})" class="px-3 py-2 text-sm whitespace-nowrap">
                        Mark Complete
                    </x-buttons.ghost>

                    <x-buttons.ghost wire:click="deleteGoal({{ $goal->id }})" class="px-3 py-2 text-sm">
                        Delete
                    </x-buttons.ghost>
                    
                </div>              
                
            </li>

        @empty

            <li class="py-3 text-lg text-center text-gray-500 select-none">No goals created yet</li>

        @endforelse

    </ul>

</x-panel>   

@push('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            window.fireCannon = function(event) {
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: { 
                        x: 0.5,
                        y: 0.85
                    }
                });
            }
            
        })
    </script>
    
@endpush