<x-panel title="Update Privacy Settings" icon="shield-check">
        
    <form wire:submit.prevent="update" id="update-profile-form">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />  
        @endif

        <div class="grid grid-cols-1 gap-2 md:gap-3 md:grid-cols-4">

            <label for="user.peer_code" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Peer Code</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.text
                    id="user.peer_code"
                    type="text" 
                    name="user.peer_code"
                    class="w-full"
                    spellcheck="false"
                    autocomplete="false"
                    wire:model.defer="user.peer_code"
                    readonly
                    required />
    
                <x-errors.inline-validation key="user.peer_code" />

            </div>    

        </div>

        <x-spacer class="py-2" />

        <div class="flex items-center justify-end">
            <x-buttons.ghost>
                Update Settings
            </x-buttons.ghost>
        </div>

    </form>

</x-panel>