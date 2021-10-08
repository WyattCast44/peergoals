<x-panel title="Add new goal" icon="lightbulb">
    
    <form wire:submit.prevent="create">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />
        @endif
    
        <div class="space-y-2">

            <label for="goal.body" class="block text-gray-500">
                What do you want to accomplish? <span class="text-sm">(you can write in markdown)</span>
            </label>
    
            <x-inputs.textarea 
                id="goal.body"
                wire:model.defer="goal.body"
                class="w-full" />
            
            <x-errors.inline-validation key="goal.body" />

            <div class="flex items-center justify-end space-x-2">
                
                <button type="button" class="items-center justify-center hidden w-8 h-8 rounded-full md:flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait" title="Request peers help you stay accountable">
                    <x-icon-user-plus class="w-5 h-5 text-gray-500" /> <span class="sr-only">Request peers help you stay accountable</span>
                </button>

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