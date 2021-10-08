<x-panel title="Update Profile" icon="user">
        
    <form wire:submit.prevent="update" id="update-profile-form">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />  
        @endif

        <div class="grid grid-cols-1 gap-2 md:grid-rows-2 md:gap-3 md:grid-cols-4">

            <label for="name" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Name</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.text
                    id="name"
                    type="text" 
                    name="name"
                    class="w-full"
                    autocomplete="name"
                    wire:model.defer="user.name"
                    required />
    
                <x-errors.inline-validation key="user.name" />

            </div>    

            <label for="email" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Email Address</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.text
                    id="email"
                    type="email" 
                    name="email"
                    class="w-full"
                    autocomplete="email"
                    wire:model.defer="user.email"
                    required />
    
                <x-errors.inline-validation key="user.email" />

            </div>                                      

        </div>

        <x-spacer class="py-2" />

        <div class="flex items-center justify-end">
            <x-buttons.ghost form="update-profile-form">
                Update Profile
            </x-buttons.ghost>
        </div>

    </form>

</x-panel>