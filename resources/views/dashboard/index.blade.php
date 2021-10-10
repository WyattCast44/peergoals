@extends('layouts.app')

@section('content')

    <div class="py-3 bg-white border-b border-gray-300">
        <div class="max-w-4xl mx-3 md:mx-auto">
            <p class="text-xl">Dashboard</p>
        </div>
    </div>

    <x-spacer class="py-3" />

    <div class="relative max-w-xl mx-3 mb-10 md:max-w-4xl md:mx-auto">

        <div class="flex flex-col w-full md:space-x-6 md:flex-row">

            <main class="flex-1 space-y-4">

                <livewire:dashboard.panels.create-goal-panel />  
                
                <livewire:dashboard.panels.manage-goals-panel />
                
            </main>

            <aside class="w-full mt-3 space-y-2 md:w-60 md:mt-0">

                <livewire:dashboard.panels.send-peer-request-panel />

                <livewire:dashboard.panels.manage-peer-requests-panel />

                <livewire:dashboard.panels.my-peers-list-panel />
                
                
            </aside>

        </div>

    </div>

@endsection