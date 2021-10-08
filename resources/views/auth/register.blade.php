<div class="w-full max-w-lg py-4 mx-6 md:mx-auto">

    <x-panel title="Register for a new account" icon="user-plus">
        
        <x-errors.inline-validation key="auth" />

        <form wire:submit.prevent="register">

            <label for="name" class="flex flex-col space-y-2">

                <span class="text-lg text-gray-600">Your Name</span>

                <x-inputs.text 
                    id="name"
                    autofocus
                    type="text" 
                    name="name"
                    autocomplete="name"
                    wire:model.defer="name"
                    required />

                <x-errors.inline-validation key="name" />

            </label>

            <label for="email" class="flex flex-col mt-4 space-y-2">

                <span class="text-lg text-gray-600">Email Address</span>

                <x-inputs.text 
                    id="email"
                    type="email" 
                    name="email"
                    autocomplete="email"
                    wire:model.defer="email"
                    required />

                <x-errors.inline-validation key="email" />

            </label>


            <label for="password" class="flex flex-col mt-4 space-y-2">

                <span class="text-lg text-gray-600">Password</span>

                <x-inputs.password
                    id="password"
                    name="password"
                    wire:model.defer="password"
                    autocomplete="password"
                    required />
                
                <x-errors.inline-validation key="password" />

            </label>


            <label for="password_confirmation" class="flex flex-col mt-4 space-y-2">

                <span class="text-lg text-gray-600">Password Confirmation</span>

                <x-inputs.password
                    id="password_confirmation"
                    name="password_confirmation"
                    wire:model.defer="password_confirmation"
                    autocomplete="password_confirmation"
                    required />
                
                <x-errors.inline-validation key="password_confirmation" />
                    
            </label>

            <div class="flex flex-col mt-8 mb-2">

                <x-buttons.primary tag="button" type="submit" class="selection:bg-gray-100 selection:text-gray-700">
                    Register
                </x-buttons.primary>

            </div>

        </form>

    </x-panel>

    <div class="mt-4 space-y-2 md:space-y-1">
    
        <p class="text-center">By registering you accept the <a href="{{ route('terms') }}">Terms</a> and the <a href="{{ route('privacy') }}">Privacy Policy</a></p>
        
        <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login instead</a></p>

    </div>
    
</div>
