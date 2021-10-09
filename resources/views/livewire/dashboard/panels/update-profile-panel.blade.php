<x-panel title="Update Profile" icon="user">
        
    <form wire:submit.prevent="update" id="update-profile-form">

        @if (session()->has('success'))
            <x-alerts.success message="{{ session('success') }}" />  
        @endif

        <div class="grid grid-cols-1 gap-2 md:grid-rows-2 md:gap-3 md:grid-cols-4">

            <label for="new_avatar" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Avatar</span>
            </label>
    
            <div class="flex items-center col-span-3 space-y-1" x-data>

                @if ($new_avatar)

                    <div class="w-12 h-12 rounded-full">    
                        <img
                            wire:target="new_avatar"
                            wire:loading.class="animate-pulse" 
                            src="{{ $new_avatar->temporaryUrl() }}"
                            class="object-cover w-full h-full rounded-full">
                    </div>
                        
                @else
                    
                    <div class="w-12 h-12 rounded-full">
                        <img 
                            wire:target="new_avatar"
                            wire:loading.class="animate-pulse"
                            src="{{ auth()->user()->avatar_url }}" 
                            class="object-cover w-full h-full rounded-full">
                            
                    </div>

                @endif

                <span class="ml-4 rounded shadow-sm">

                    <input type="file" name="avatar" id="new_avatar" wire:model="new_avatar" class="sr-only" x-ref="input">

                    <button type="button"
                            class="px-3 py-2 font-semibold text-gray-700 transition duration-75 bg-gray-200 border-transparent rounded hover:bg-gray-300 hover:shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-400 disabled:cursor-wait disable:text-gray-600 selection:bg-purple-300"
                            x-on:click="$refs.input.click()">
                        Change
                    </button>

                    <div wire:loading class="ml-1 text-sm text-gray-400" wire:target="new_avatar">
                        Uploading...
                    </div>
                    
                </span>

                <x-errors.inline-validation key="new_avatar" />

            </div> 

            <label for="username" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Username</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.text
                    id="username"
                    type="text" 
                    name="username"
                    class="w-full"
                    spellcheck="false"
                    autocomplete="username"
                    wire:model.defer="user.username"
                    required />
    
                <x-errors.inline-validation key="user.username" />

            </div> 

            <label for="name" class="flex items-center">
                <span class="text-gray-600 flex-nowrap">Name</span>
            </label>
    
            <div class="col-span-3 space-y-1">

                <x-inputs.text
                    id="name"
                    type="text" 
                    name="name"
                    class="w-full"
                    spellcheck="false"
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