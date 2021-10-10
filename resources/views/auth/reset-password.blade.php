<div class="max-w-lg py-2 md:py-4 md:mx-auto">

    <x-panel title="Reset your password" icon="shield-check">
           
        <form wire:submit.prevent="resetPassword">

            @error('token')
                <x-alerts.error :message="$message" />
            @enderror

            @error('general')
                <x-alerts.error :message="$message" />
            @enderror

            <p class="pb-2 border-b border-gray-300">
                This form will allow you to reset your forgotten password, once you submit the form you will be logged in and your  password will be updated.
            </p>

            <x-spacer class="py-2" />

            <div class="grid grid-cols-1 gap-2">
                
                <label for="email" class="text-gray-600 flex-nowrap">
                    Email Address
                </label>
        
                <div class="col-span-2 space-y-1">

                    <x-inputs.text
                        autofocus 
                        id="email"
                        type="email" 
                        name="email"
                        class="w-full border-gray-400"
                        wire:model.defer="email"
                        required />
        
                    <x-errors.inline-validation key="email" />
    
                </div> 

                <label for="new_password" class="text-gray-600 flex-nowrap">
                    New Password
                </label>
        
                <div class="col-span-2 space-y-1">

                    <x-inputs.password
                        id="new_password"
                        name="new_password"
                        wire:model.defer="new_password"
                        class="w-full"
                        autocomplete="new_password"
                        required />

                    <x-errors.inline-validation key="new_password" />
    
                </div>                    

                <label for="new_password_confirmation" class="text-gray-600 flex-nowrap">
                    New Password Confirmation
                </label>
        
                <div class="col-span-2 space-y-1">

                    <x-inputs.password
                        id="new_password_confirmation"
                        name="new_password_confirmation"
                        wire:model.defer="new_password_confirmation"
                        class="w-full"
                        autocomplete="new_password_confirmation"
                        required />
        
                    <x-errors.inline-validation key="new_password_confirmation" />
    
                </div>                    
    
            </div>

            <label for="token" class="hidden">

                <input 
                    id="token"
                    name="token"
                    type="hidden" 
                    class="hidden"
                    wire:model.defer="token"
                    required>
    
            </label>
    
            <x-spacer class="py-2" />
    
            <div class="flex items-center justify-end">
                
                <x-buttons.ghost>
                    Reset Password and Login
                </x-buttons.ghost>

            </div>
    
        </form>

    </x-panel>

    <div class="mt-4 space-y-2 md:space-y-1">
    
        {{-- <p class="text-center">Remembered your password? <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Log in</a></p> --}}

    </div>

</div>