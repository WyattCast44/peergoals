@extends('layouts.base')

@push('body:classes', 'bg-gray-100')

@section('body')

    <x-partials.colorband />

    <header class="flex items-center w-full py-2 bg-white border-b border-gray-300">

        <div class="w-full max-w-4xl mx-6 space-y-0.5 font-semibold leading-none tracking-tight md:mx-auto">
            <h1>
                <a href="{{ route('welcome') }}" class="inline-block text-2xl font-bold text-gray-700">{{ config('app.meta.name') }}</a>
            </h1>
            <p class="text-sm text-gray-500"><a href="{{ route('docs.index') }}">Documentation</a></p>
        </div>

    </header>

    @yield('content')

@endsection