<x-panel title="Add Peer" icon="user-plus" :padding="false">
                    
    <form wire:submit.prevent="sendRequest" class="px-4 py-2">

        <label for="code" class="flex flex-col mb-2 space-y-2">

            <span class="text-sm text-gray-600">Enter someones peer code</span>
            
            <x-inputs.text 
                autofocus
                id="code"
                type="text" 
                name="code"
                autocomplete="false"
                wire:model.defer="code"
                required />

            <x-errors.inline-validation key="code" />
                
        </label>        

        <div class="mb-2">

            <x-buttons.ghost tag="button" type="submit" class="w-full">
                Send Request
            </x-buttons.ghost>

        </div>

    </form>

</x-panel>