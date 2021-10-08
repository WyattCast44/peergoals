@if (auth()->user()->twoFactorAuthEnabled())

    <x-panel title="Manage Two Factor Authentication" icon="chrome">
        
        @if (session('status') == 'two-factor-authentication-enabled')
            <x-alerts.success message="Two factor authentication has been enabled!" />
        @endif

        <div class="flex flex-col mb-3 space-y-4 border-gray-200 divide-gray-200 md:border-b-2 md:flex-row md:space-y-0 md:space-x-4 md:divide-x-2">

            <div class="flex items-center justify-center">
                {!! request()->user()->twoFactorQrCodeSvg() !!}
            </div>

            <div class="px-3 pb-3">
                <p class="text-lg font-semibold">Recovery Codes</p>
                <ul class="text-gray-600 list-disc list-inside">
                    @foreach ((array) request()->user()->recoveryCodes() as $code)
                        <li class="select-all">{{ $code }}</li>
                    @endforeach
                </ul>
            </div>
            
        </div>

        <form action="{{ url('user/two-factor-authentication') }}" method="post" class="flex items-center justify-end">
                
            @csrf
            @method('delete')
            
            <x-buttons.ghost tag="button" type="submit">
                Disable two factor authentication
            </x-buttons.ghost>            

        </form>

    </x-panel>
    
@else
    
    <x-panel title="Two Factor Authentication" icon="chrome">

        @if (session('status') == 'two-factor-authentication-disabled')
            <x-alerts.success message="Two factor authentication has been disabled!" />
        @endif

        <p>
            We highly encourage you to set up Two-Factor Authentication for your account, we currently only support Google Authenticator.
        </p>

        <x-spacer class="py-1.5" />
        
        <div class="flex items-center justify-end">

            <form action="{{ url('user/two-factor-authentication') }}" method="post">
                
                @csrf
                
                <x-buttons.ghost tag="button" type="submit">
                    Enable two factor authentication
                </x-buttons.ghost>            

            </form>
                    
        </div>
        
    </x-panel>

@endif