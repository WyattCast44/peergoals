<div class="w-full max-w-lg py-4 mx-6 md:mx-auto">

    <x-panel title="Reset your password" icon="shield-check">
           
        <form wire:submit.prevent="attempt">

            @if (session()->has('success'))
                <x-alerts.success message="{{ session('success') }}" />  
            @endif

            <div class="grid grid-cols-1 grid-rows-1 gap-3">

                <label for="email" class="text-gray-600 flex-nowrap">
                    Forgot your password? Not to worry, enter the email address associated with your account and we will send you a link to reset your password.
                </label>
        
                <div class="space-y-1">

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
    
            </div>
    
            <x-spacer class="py-2" />
    
            <div class="flex items-center justify-end">
                
                <x-buttons.ghost>
                    Send Password Reset Email
                </x-buttons.ghost>

            </div>
    
        </form>

    </x-panel>

    <div class="mt-4 space-y-2 md:space-y-1">
    
        <p class="text-center">Remembered your password? <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Log in</a></p>

    </div>

</div>