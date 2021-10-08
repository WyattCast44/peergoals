<x-panel title="Create Client" icon="user-plus">
    
    @if (session()->has('success'))
        <x-alerts.success message="{{ session('success') }}" />
    @endif

    {{-- <form wire:submit.prevent="create">

        <div class="grid grid-cols-1 gap-2 md:grid-rows-2 md:grid-cols-4">
    
            <label for="client.name" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Client Name</span>
            </label>
    
            <div class="col-span-3 space-y-1">
    
                <x-inputs.text
                    id="client.name"
                    class="w-full"
                    type="text" 
                    name="client.name"
                    autocomplete="off"
                    wire:model.defer="client.name"
                    required />
                    
                <x-errors.inline-validation key="client.name" />
    
            </div>    

            <label for="client.email" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Client Email</span>
            </label>
    
            <div class="col-span-3 space-y-1">
    
                <x-inputs.text
                    id="client.email"
                    class="w-full"
                    type="text" 
                    name="client.email"
                    autocomplete="off"
                    wire:model.defer="client.email"
                    required />
                    
                <x-errors.inline-validation key="client.email" />
    
            </div>    
            
        </div>

        <x-spacer class="py-2" />

        <div class="flex items-center justify-end">
            <x-buttons.ghost type="submit">
                Create Client
            </x-buttons.ghost>
        </div>

    </form>    --}}
    
</x-panel>    