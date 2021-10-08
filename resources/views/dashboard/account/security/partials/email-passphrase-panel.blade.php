<x-panel title="Email Passphrase Setup" icon="annotation">

    <p>
        In today's world where phishing emails are common we recommend setting a passphrase that we will include in our emails to you so that you know for sure that when we email you it is 100% legimate.
    </p>
    
    <form action="#" method="post" class="flex items-center justify-end">
            
        @csrf
        
        <x-buttons.ghost tag="button" type="button">
            Save Passphrase
        </x-buttons.ghost>            

    </form>

</x-panel>