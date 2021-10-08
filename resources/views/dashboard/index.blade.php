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

                <x-panel title="Add new goal" icon="plus-square">

                    <div class="space-y-2">

                        <label for="goal" class="block text-gray-500">
                            What do you want to accomplish?
                        </label>
    
                        <x-inputs.textarea 
                            id="goal"
                            class="w-full" />

                        <label for="peers" class="block text-gray-500">
                            Request some peers to help you stay on track?
                        </label>
    
                        <x-inputs.select id="peers" class="w-full">
                            <option value="0">Select a peer</option>
                            <option value="{{ auth()->user()->peer_code }}">{{ auth()->user()->peer_code }}</option>
                        </x-inputs.select>

                    </div>
                    

                </x-panel>  
                
            </main>

            <aside class="w-48 h-40 p-3 bg-gray-200 rounded shadow-inner py-1.5">
                ...
            </aside>

        </div>

    </div>

@endsection