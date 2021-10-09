@extends('layouts.base')

@push('body:classes', 'bg-gray-100')

@section('body')

    <x-partials.colorband />

    <header class="flex items-center w-full py-3 bg-white border-b border-gray-300">

        <div class="flex items-center justify-between w-full max-w-xl mx-4 md:max-w-4xl md:mx-auto">

            <h1 class="font-semibold leading-none tracking-tight">
                <a href="{{ route('dashboard') }}" class="inline-block text-xl font-bold text-gray-700 md:text-3xl">{{ config('app.meta.name') }}</a>
            </h1>

            <div class="flex items-center justify-center space-x-2.5">

                <a href="{{ route('dashboard.notifications.index') }}" class="items-center justify-center hidden w-8 h-8 rounded-full md:flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait">
                    <x-icon-bell class="w-6 h-6 text-gray-500" /> <span class="sr-only">Notifications menu</span>
                </a>
                
                <!-- profile dropdown -->
                <div x-data="{ open: false }" class="relative flex items-center justify-center">

                    <button class="inline-block w-8 h-8 overflow-hidden bg-gray-200 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait" x-on:click="open=!open">
                        <img src="{{ auth()->user()->avatar_url }}" class="object-cover w-full h-full rounded-full" x-data x-on:user-avatar-updated.window="$el.src = event.detail.avatar;">
                        <span class="sr-only">Profile menu</span>
                    </button>

                    <nav
                        x-cloak
                        x-show.transition="open" 
                        x-on:click.outside="open=false"
                        x-on:keydown.escape="open=false"
                        class="absolute right-0 z-50 w-48 py-1 bg-white border border-gray-300 rounded shadow top-10">

                        <div class="py-1.5 border-b border-gray-300 px-3 select-none mb-1">
                            <p class="text-xs text-gray-500">Signed in as</p>
                            <p class="text-base font-semibold text-gray-700 truncate" x-data 
                                x-on:user-name-updated.window="$el.innerHTML = $event.detail.name" title="{{ auth()->user()->name }}">
                                {{ auth()->user()->name }}
                            </p>
                        </div>

                        <a href="{{ route('dashboard.account.index') }}" 
                            class="block w-full px-3 py-1 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-50 focus:ring-1 focus:ring-gray-200 focus:shadow-inner">My Account</a>

                        <button 
                            onclick="document.getElementById('logout-form').submit()" 
                            class="block w-full px-3 py-1 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-50 focus:ring-1 focus:ring-gray-200 focus:shadow-inner">Logout</button>

                    </nav>

                </div>

            </div>

        </div>

    </header>

    @yield('content')

    @once
        @push('footer')            
            <form action="{{ route('logout') }}" method="post" class="hidden" id="logout-form" x-cloak>
                @csrf
                <button type="submit" class="sr-only">Logout</button>
            </form>
        @endpush
    @endonce

@endsection