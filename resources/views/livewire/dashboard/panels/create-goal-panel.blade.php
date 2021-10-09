<x-panel title="Add new goal" icon="lightbulb">
    
    <form wire:submit.prevent="create">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />
        @endif
    
        <div class="space-y-2">

            <label for="goal.body" class="block text-gray-500">
                What do you want to accomplish?
            </label>
    
            <x-inputs.textarea 
                id="goal.body"
                class="w-full"
                wire:model.defer="goal.body"
                required />

            {{ $selectedPeers }}
            
            <x-errors.inline-validation key="goal.body" />

            <div class="flex items-center justify-end space-x-2">
                
                <div x-data="{ open: false }" class="relative">

                    <button type="button" class="items-center justify-center hidden w-8 h-8 rounded-full md:flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait" title="Request peers help you stay accountable" x-on:click="open=!open">
                        <x-icon-user-plus class="w-5 h-5 text-gray-500" /> <span class="sr-only">Request peers help you stay accountable</span>
                    </button>

                    <div 
                        x-cloak
                        x-show="open" 
                        x-transition
                        x-on:click.outside="open=false"
                        x-on:keydown.escape.window="open=false"
                        class="absolute right-0 bg-white border border-gray-300 divide-y rounded shadow-lg top-10 w-36" >
                        
                        <div class="p-1">
                            <input type="search" wire:model="search" name="search" id="search" class="w-full p-1 text-sm border-gray-400 rounded focus:border-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">
                        </div>
                        
                        <ul class="overflow-y-scroll divide-y max-h-32 no-scrollbar">
                            
                            @forelse ($availablePeers as $peer)
                                <li class="flex items-center px-2 py-1.5 space-x-2 hover:bg-gray-100 cursor-pointer" wire:click="addPeerToGoal({{ $peer->id }})">
                                    <img src="{{ $peer->avatar_url }}" alt="{{ $peer->name }}'s avatar" class="w-6 h-6 rounded-full">
                                    <span class="truncate">{{ $peer->name }}</span>
                                </li>
                            @empty
                                <li class="text-sm text-gray-500 py-1.5 text-center select-none">
                                    No peers to add
                                </li>
                            @endforelse

                        </ul>

                    </div>

                </div>

                <button type="button" class="items-center justify-center hidden w-8 h-8 rounded-full md:flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait" title="Pick a due date">
                    <x-icon-calendar class="w-5 h-5 text-gray-500" /> <span class="sr-only">Pick a due date</span>
                </button>

                <x-buttons.ghost type="submit">
                    Create Goal
                </x-buttons.ghost>
            </div>

        </div>    

        
                
    </form>

</x-panel>