@extends('layouts.app')

@section('content')

    <div class="bg-white py-3 border-b border-gray-300">
        <div class="max-w-4xl mx-auto">
            <p class="text-xl">Invoices</p>
        </div>
    </div>

    <x-spacer class="py-3" />

    <div class="max-w-4xl mx-auto">
        @include('table')
    </div>
    
@endsection