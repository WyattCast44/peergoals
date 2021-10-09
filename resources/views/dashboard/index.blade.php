@extends('layouts.app')

@section('content')

    <div class="py-3 bg-white border-b border-gray-300">
        <div class="max-w-4xl mx-auto">
            <p class="text-xl">Dashboard</p>
        </div>
    </div>

    <x-spacer class="py-3" />

    <div class="w-full max-w-xl mx-6 md:max-w-4xl md:mx-auto">

        <div class="flex w-full space-x-6">

            <main class="flex-1 space-y-4">

                <livewire:dashboard.panels.create-goal-panel />  
                
                <livewire:dashboard.panels.manage-goals-panel /> 

                <livewire:dashboard.panels.manage-peer-requests-panel />                   
                
            </main>

            <aside class="space-y-2 w-60">

                <livewire:dashboard.panels.send-peer-request-panel />

                <p class="select-all">
                    {{ auth()->user()->peer_code }}
                </p>
            </aside>

        </div>

    </div>

@endsection