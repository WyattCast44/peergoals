@extends('layouts.app')

@section('content')

    <div class="py-3 bg-white border-b border-gray-300">
        <div class="max-w-4xl mx-auto">
            <p class="text-xl">Dashboard</p>
        </div>
    </div>

    <x-spacer class="py-3" />

    <div class="w-full max-w-xl mx-6 md:max-w-4xl md:mx-auto">

        <div class="flex w-full space-x-8">

            <main class="flex-1">

                <livewire:dashboard.panels.create-goal-panel />  
                
                <x-spacer class="py-2" />
                
                <livewire:dashboard.panels.manage-goals-panel />                   
                
            </main>

            <aside class="w-56 h-40 p-3 bg-gray-200 rounded shadow-inner py-1.5">
                ...
            </aside>

        </div>

    </div>

@endsection