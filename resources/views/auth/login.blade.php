<div class="max-w-lg py-2 mb-4 md:py-4 md:mx-auto">

    <x-panel title="Login to your account" icon="user">
        
        @error('auth')
            <x-alerts.error message="{{ $message }}" />
        @enderror

        <form wire:submit.prevent="authenticate" class="space-y-4">

            <label for="email" class="flex flex-col space-y-2">
    
                <span class="text-lg text-gray-600">Email Address</span>
                
                <x-inputs.text 
                    autofocus
                    id="email"
                    type="email" 
                    name="email"
                    autocomplete="email"
                    wire:model.defer="email"
                    required />

                <x-errors.inline-validation key="email" />
                    
            </label>        
    
            <label for="password" class="flex flex-col space-y-2">
    
                <span class="text-lg text-gray-600">Password</span>
    
                <x-inputs.password
                    id="password"
                    name="password"
                    wire:model.defer="password"
                    autocomplete="password"
                    required />
                
                    <x-errors.inline-validation key="password" />
                    
            </label>
    
            <div class="flex flex-col">
    
                <x-buttons.primary tag="button" type="submit">
                    Log in
                </x-buttons.primary>
    
            </div>
    
        </form>

    </x-panel>

    <div class="mx-2 mt-4 space-y-2 md:space-y-1">
    
        <p class="text-center">Forgot your password? <a href="{{ route('password.email') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Reset password</a></p>
        
        <p class="text-center">Need an account? <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Sign up</a></p>

    </div>
    
</div>