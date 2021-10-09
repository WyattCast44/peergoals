<x-panel title="Email Passphrase" icon="annotation">

    @if (session()->has('success'))
        <x-alerts.success message="{{ session('success') }}" />
    @endif

    <p>
        In today's world where phishing emails are common we recommend setting a passphrase that we will include in our emails to you so that you know for sure that when we email you it is 100% legimate.
    </p>
    
    <form wire:submit.prevent="save" class="space-y-3">
            
        @csrf

        <label for="email_passphrase" class="sr-only">
            Passphrase
        </label>

        <x-inputs.text 
            type="text"
            id="email_passphrase"
            name="email_passphrase"
            class="w-full"
            spellcheck="false"
            autocomplete="false"
            wire:model.defer="email_passphrase"
             />

        <x-errors.inline-validation key="email_passphrase" />
        
        <div class="flex items-center justify-end">

            <x-buttons.ghost tag="button">
                Save Passphrase
            </x-buttons.ghost>            

        </div>

    </form>

</x-panel>