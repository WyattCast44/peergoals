@extends('layouts.app')

@section('content')

    <div class="py-3 bg-white border-b border-gray-300">
        <div class="max-w-4xl mx-4 md:mx-auto">
            <p class="text-xl">Account</p>
        </div>
    </div>

    <x-spacer class="py-2 md:py-5" />

    <section class="flex flex-col max-w-4xl mx-4 space-y-4 md:space-x-4 md:space-y-0 md:mx-auto md:flex-row">
        
        <aside class="flex-shrink-0 w-full md:w-44">

            <!-- mobile nav -->
            <nav class="md:hidden">
                <x-nav.select class="w-full border-gray-400">
                    
                    <x-nav.select-option 
                        active="dashboard.account.index" 
                        label="Profile" 
                        value="{{ route('dashboard.account.index') }}" />

                    <x-nav.select-option 
                        active="dashboard.account.security" 
                        label="Security" 
                        value="{{ route('dashboard.account.security') }}" />
                    
                    <x-nav.select-option 
                        active="dashboard.account.activity" 
                        label="Activity Log" 
                        value="{{ route('dashboard.account.activity') }}" />

                    <x-nav.select-option 
                        active="dashboard.account.api" 
                        label="API" 
                        value="{{ route('dashboard.account.api') }}" />            
                    
                </x-nav.select>
            </nav>
            <!-- /mobile nav -->
            
            <!-- desktop nav -->
            <nav class="flex-col hidden space-y-4 md:flex">

                <a href="{{ route('dashboard.account.index') }}" class="flex items-center font-semibold rounded-sm hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 {{ active('dashboard.account.index', 'text-purple-700') }}">
                    <x-icon-user class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> Profile
                </a>

                <a href="{{ route('dashboard.account.security') }}" class="flex items-center font-semibold rounded-sm hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 {{ active('dashboard.account.security', 'text-purple-700') }}">
                    <x-icon-lock class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> Security
                </a>

                <a href="{{ route('dashboard.account.activity') }}" class="flex items-center font-semibold rounded-sm hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 {{ active('dashboard.account.activity', 'text-purple-700') }}">
                    <x-icon-shield-check class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> Activity Log
                </a>

                <a href="{{ route('dashboard.account.api') }}" class="flex items-center font-semibold rounded-sm hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 {{ active('dashboard.account.api', 'text-purple-700') }}">
                    <x-icon-cloud-lightning class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> API
                </a>

                <a href="{{ route('dashboard.account.clients') }}" class="flex items-center font-semibold rounded-sm hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 {{ active('dashboard.account.clients', 'text-purple-700') }}">
                    <x-icon-users class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> Clients
                </a>

                <a href="{{ route('dashboard.account.clients') }}" class="flex items-center font-semibold rounded-sm hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 {{ active('dashboard.account.e', 'text-purple-700') }}">
                    <x-icon-identification class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> Business Profiles
                </a>

            </nav>
            <!-- /desktop nav -->
            
        </aside>

        <main class="flex-1 w-full pb-6">
            @yield('page')
        </main>

    </section>

@endsection