@extends('layouts.base')

@push('body:classes', 'bg-white')

@section('body')

    <x-partials.colorband />

    <x-spacer class="py-2 md:py-8" />

    <!-- logo and login -->
    <header class="flex items-center justify-between max-w-2xl mx-4 md:mx-auto">
        
        <div class="w-full max-w-xl space-y-1 font-semibold leading-none tracking-tight md:max-w-3xl md:mx-auto">
            <h1 class="inline-block text-3xl font-bold text-gray-700">
                PeerGoals
            </h1>
            <p class="text-base text-gray-500">Simple goal accountability</p>
        </div>

        <nav>
            <x-buttons.ghost tag="a" href="{{ route('login') }}">
                Login
            </x-buttons.ghost>
        </nav>

    </header>

    <x-spacer class="py-4 md:py-8" />

    <!-- hero -->
    <section class="max-w-2xl mx-4 md:mx-auto">
        
        <h2 class="text-5xl font-black leading-tight tracking-tight text-gray-700">
            Level up your productivity
        </h2>

        <p class="mt-6 text-2xl text-gray-600">
            Create goals and have your peers help you stay accountable and vice versa.
        </p>

    </section>

    <x-spacer class="py-6" />

    <!-- ctas -->
    <section class="flex items-center max-w-2xl mx-4 md:mx-auto">

        <x-buttons.primary tag="a" href="{{ route('register') }}" class="text-xl">
            Create your first goal
        </x-buttons.primary>

    </section>

    <x-spacer class="pb-64" />

@endsection