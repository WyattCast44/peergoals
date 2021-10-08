@extends('dashboard.account.layout')

@section('page')

    @if (auth()->user()->apiEnabled())
    
        <livewire:dashboard.panels.create-api-token-panel />
        
        <x-spacer class="py-2" />
        
        <livewire:dashboard.panels.manage-api-tokens-panel />

        <x-spacer class="py-1" />
    
        <div class="text-sm text-gray-500">
            <p class="text-right">
                <a href="{{ route('docs.index') }}">API Documentation</a> 
                &middot;
                API enabled on {{ auth()->user()->api_disclaimer_accepted_at->format('M-d-Y') }}
            </p>
        </div>
    
    @else

        <x-panel title="Enable API Access" icon="shield-exclamation">

            <p>
                This page allows you to create and manage API tokens, which are tools meant for developers and programmers to extend PeerGoals. These tokens can be used to perform actions on your behalf and thus should be treated as secret/sensitive. If you are not familiar with API tokens or the service asking you for a token, please proceed carefully. If you
                would like to proceed, please click the button below to enable API access for your account.
            </p>

            <x-spacer class="py-1.5" />
            
            <div class="flex items-center justify-end">
                
                <livewire:buttons.enable-api-access-button />
                
            </div>
            
        </x-panel>

        <x-spacer class="py-1" />

        <div class="text-sm text-gray-500">
            <p class="text-right">
                <a href="{{ route('docs.index') }}">API Documentation</a> 
            </p>
        </div>

    @endif   

@endsection