@extends('layouts.app')

@section('content')

    <div class="py-3 bg-white border-b border-gray-300">
        <div class="max-w-4xl mx-auto">
            <p class="text-xl">Create New Invoice</p>
        </div>
    </div>

    <x-spacer class="py-3" />

    <main class="max-w-2xl mx-auto">

        <livewire:dashboard.invoices.pages.create-invoice-page />

    </main>
    
@endsection