@extends('layouts.base')

@push('body:classes', 'bg-gray-100')

@section('body')

    <x-partials.colorband />

    <header class="flex items-center w-full py-3 bg-white border-b border-gray-300">

        <div class="w-full max-w-lg mx-6 space-y-1 font-semibold leading-none tracking-tight md:mx-auto">
            <h1>
                <a href="{{ route('welcome') }}" class="inline-block text-3xl font-bold text-gray-700">{{ config('app.meta.name') }}</a>
            </h1>
            <p class="text-base text-gray-500">{{ config('app.meta.tagline') }}</p>
        </div>

    </header>

    <x-spacer class="py-3" />

    @yield('content')
    
@endsection