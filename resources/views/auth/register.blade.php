<div class="max-w-lg py-2 md:py-4 md:mx-auto">

    <x-panel title="Register for a new account" icon="user-plus">
        
        <x-errors.inline-validation key="auth" />

        <form wire:submit.prevent="register" class="space-y-4">

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

            <label for="username" class="flex flex-col space-y-2">

                <span class="text-lg text-gray-600">Your Username</span>

                <x-inputs.text 
                    id="username"
                    autofocus
                    type="text" 
                    name="username"
                    autocomplete="username"
                    wire:model.defer="username"
                    required />

                <x-errors.inline-validation key="username" />

            </label>

            <label for="email" class="flex flex-col space-y-2">

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


            <label for="password_confirmation" class="flex flex-col space-y-2">

                <span class="text-lg text-gray-600">Password Confirmation</span>

                <x-inputs.password
                    id="password_confirmation"
                    name="password_confirmation"
                    wire:model.defer="password_confirmation"
                    autocomplete="password_confirmation"
                    required />
                
                <x-errors.inline-validation key="password_confirmation" />
                    
            </label>

            <div class="flex flex-col mb-2">

                <x-buttons.primary tag="button" type="submit" class="selection:bg-gray-100 selection:text-gray-700">
                    Register
                </x-buttons.primary>

            </div>

        </form>

    </x-panel>

    <div class="mx-2 mt-4 space-y-2 md:space-y-1">
    
        <p class="text-center">By registering you accept the <a href="{{ route('terms') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Terms</a> and the <a href="{{ route('privacy') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Privacy Policy</a></p>
        
        <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-700 hover:underline">Login instead</a></p>

    </div>
    
</div>
