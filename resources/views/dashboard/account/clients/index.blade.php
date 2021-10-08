@extends('dashboard.account.layout')

@section('page')

    <livewire:dashboard.panels.create-client-panel />

    <x-spacer class="py-2" />
    
    <livewire:dashboard.panels.manage-clients-panel />

@endsection