<x-panel title="Change Password" icon="lock">
        
    <form wire:submit.prevent="update" id="update-password-form">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />  
        @endif

        <div class="grid grid-cols-1 gap-2 md:grid-rows-2 md:gap-3 md:grid-cols-4">

            <label for="current_password" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Current Password</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.password
                    id="current_password"
                    type="password" 
                    name="current_password"
                    autocomplete="current_password"
                    wire:model.defer="current_password"
                    required />
                
                <x-errors.inline-validation key="current_password" />

            </div>    

            <label for="new_password" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">New Password</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.password
                    id="new_password"
                    type="password" 
                    name="new_password"
                    autocomplete="new_password"
                    wire:model.defer="new_password"
                    required />
                    
                <x-errors.inline-validation key="new_password" />

            </div>                        

            <label for="new_password_confirmation" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">New Password Confirmation</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.password
                    id="new_password_confirmation"
                    type="password" 
                    name="new_password_confirmation"
                    autocomplete="new_password_confirmation"
                    wire:model.defer="new_password_confirmation"
                    required />
    
                <x-errors.inline-validation key="new_password_confirmation" />

            </div>                        

        </div>

        <x-spacer class="py-2" />

        <div class="flex items-center justify-end">
            <x-buttons.ghost form="update-password-form">
                Update Password
            </x-buttons.ghost>
        </div>

    </form>

</x-panel>