<x-panel title="Create API Token" icon="key">
    
    @if (session()->has('token'))
        <x-alerts.success>
            <x-slot name="message">
                Token created! <span class="select-all">{{ session('token') }}</span>
            </x-slot>
        </x-alerts.success>  
    @endif

    <form wire:submit.prevent="create">

        <div class="grid grid-cols-1 gap-2 md:grid-rows-1 md:grid-cols-4">
    
            <label for="name" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Token Name</span>
            </label>
    
            <div class="col-span-3 space-y-1">
    
                <x-inputs.text
                    id="name"
                    class="w-full"
                    type="text" 
                    name="name"
                    autocomplete="off"
                    wire:model.defer="name"
                    required />
                    
                <x-errors.inline-validation key="name" />
    
            </div>    
            
        </div>

        <x-spacer class="py-2" />

        <div class="flex items-center justify-end">
            <x-buttons.ghost type="submit">
                Create Token
            </x-buttons.ghost>
        </div>

    </form>   
    
</x-panel>    