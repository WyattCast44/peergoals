<div class="max-w-lg py-2 md:py-4 md:mx-auto">

    <x-panel title="Confirm your password to continue" icon="lock">
           
        <form wire:submit.prevent="attempt">

            <div class="grid grid-cols-4 grid-rows-1 gap-3">

                <label for="password" class="flex items-center">
                    <span class="text-gray-600 flex-nowrap">Password</span>
                </label>
        
                <div class="col-span-3 space-y-1">

                    <x-inputs.password
                        autofocus
                        id="password"
                        class="w-full"
                        name="password"
                        wire:model.defer="password"
                        autocomplete="password"
                        required />
        
                    <x-errors.inline-validation key="password" />
    
                </div>                    
    
            </div>
    
            <x-spacer class="py-2" />
    
            <div class="flex items-center justify-end">
                
                <x-buttons.ghost>
                    Confirm and Continue
                </x-buttons.ghost>

            </div>
    
        </form>

    </x-panel>

</div>