@extends('layouts.auth')

@section('content')
    
<div class="max-w-lg py-2 md:py-4 md:mx-auto">

    <x-panel title="Enter your 2FA code" icon="shield-check">
           
        <form method="POST" action="{{ url('/two-factor-challenge') }}">

            @csrf

            <div class="grid grid-cols-4 grid-rows-1 gap-3">

                <label for="code" class="flex items-center">
                    <span class="text-gray-600 flex-nowrap">Code</span>
                </label>
        
                <div class="col-span-3 space-y-1">

                    <x-inputs.password
                        id="code"
                        class="w-full"
                        name="code"
                        required />
        
                    <x-errors.inline-validation key="code" />
    
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

@endsection