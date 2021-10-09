@extends('dashboard.account.layout')

@section('page')

    <livewire:dashboard.panels.update-password-panel />
    
    <x-spacer class="py-2" />
    
    <livewire:dashboard.panels.email-passphrase-panel />
    
    <x-spacer class="py-2" />
    
    @include('dashboard.account.security.partials.two-factor-auth-panels')    
    
@endsection