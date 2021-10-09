@extends('layouts.base')

@push('body:classes', 'bg-gray-100')

@section('body')

    <x-partials.colorband />

    <header class="flex items-center w-full py-3 bg-white border-b border-gray-300">

        <div class="flex items-center justify-between w-full max-w-xl mx-4 md:max-w-4xl md:mx-auto">

            <!-- app-name -->
            <h1 class="font-semibold leading-none tracking-tight">
                <a href="{{ route('dashboard') }}" class="inline-block text-xl font-bold text-gray-700 md:text-3xl">{{ config('app.meta.name') }}</a>
            </h1>

            <!-- right side menu -->
            <div class="flex items-center justify-center space-x-2.5">

                <!-- notifications icon -->
                <a href="{{ route('dashboard.notifications.index') }}" class="items-center justify-center hidden w-8 h-8 rounded-full md:flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait">
                    <x-icon-bell class="w-6 h-6 text-gray-500" /> <span class="sr-only">Notifications menu</span>
                </a>
                
                <!-- profile dropdown -->
                @include('layouts.partials.profile-dropdown')                

            </div>

        </div>

    </header>

    <div>
        @yield('content')
    </div>

    @once
        @push('footer')            
            <form action="{{ route('logout') }}" method="post" class="hidden" id="logout-form" x-cloak>
                @csrf
                <button type="submit" class="sr-only">Logout</button>
            </form>
        @endpush
    @endonce

@endsection