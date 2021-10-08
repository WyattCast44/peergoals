<section>

    <h2 class="w-full max-w-lg mx-6 text-3xl font-bold leading-none text-gray-700 md:mx-auto">
        Reset your Password
    </h2>

    <x-spacer class="py-3" />

    <div class="w-full max-w-lg py-4 mx-6 md:mx-auto">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />  
        @endif

        <form wire:submit.prevent="attempt">

            <label for="email" class="flex flex-col space-y-2 mb-">

                <span class="text-lg text-gray-600">Your Email Address</span>

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

            <div class="flex flex-col mt-6 space-y-6">

                <x-buttons.primary tag="button" type="submit" class="selection:bg-gray-100 selection:text-gray-700">
                    Send Password Reset Email
                </x-buttons.primary>

                <div class="space-y-2 md:space-y-1">
                    <p>Remembered your password? <a href="{{ route('login') }}">Try logging in</a>.</p>
                </div>

            </div>

        </form>
    
    </div>
    
</section>
