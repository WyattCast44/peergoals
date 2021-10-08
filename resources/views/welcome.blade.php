@extends('layouts.base')

@push('body:classes', 'bg-white')

@section('body')

    <x-partials.colorband />

    <x-spacer class="py-8" />

    <!-- logo and login -->
    <header class="flex items-center justify-between max-w-3xl mx-auto">
        
        <div class="w-full max-w-xl mx-6 space-y-1 font-semibold leading-none tracking-tight md:max-w-3xl md:mx-auto">
            <h1 class="inline-block text-3xl font-bold text-gray-700">
                PeerGoals
            </h1>
            <p class="text-base text-gray-500">Simple goal accountability</p>
        </div>

        <nav>
            <a href="{{ route('login') }}" class="flex items-center px-6 py-2 font-semibold text-gray-600 transition duration-75 bg-gray-200 border-transparent rounded-full hover:bg-gray-300 hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-400 focus:shadow-inner">
                Login
            </a>
        </nav>

    </header>

    <x-spacer class="py-8" />

    <!-- hero -->
    <section class="max-w-3xl mx-auto">
        
        <h2 class="text-6xl font-black leading-tight tracking-tight text-gray-700">
            Level up your productivity
        </h2>

        <p class="mt-6 text-xl text-gray-600">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magni inventore dolor.
        </p>

    </section>

    <x-spacer class="py-4" />

    <!-- ctas -->
    <section class="flex items-center max-w-3xl mx-auto space-x-3">

        <x-buttons.primary tag="a" href="{{ route('register') }}" class="selection:bg-gray-100 selection:text-gray-700">
            Create your first goal
        </x-buttons.primary>

        <x-buttons.ghost tag="a" href="/test">
            Check out a demo
        </x-buttons.ghost>

    </section>

    <x-spacer class="pb-64" />

@endsection