@extends('layouts.docs')

@section('content')

    <x-spacer class="py-2 md:py-5" />

    <section class="flex flex-col h-full max-w-4xl mx-4 space-y-4 md:space-x-4 md:space-y-0 md:mx-auto md:flex-row">
        
        <aside class="flex-shrink-0 w-full pr-2 border-r-2 border-gray-300 md:w-36">

            <!-- mobile nav -->
            <nav class="md:hidden">
                <x-nav.select class="w-full border-gray-400">
                    
                    <x-nav.select-option 
                        active="docs.api.*" 
                        label="API" 
                        value="#" />            
                    
                </x-nav.select>
            </nav>
            <!-- /mobile nav -->
            
            <!-- desktop nav -->
            <nav class="flex-col hidden space-y-1 md:flex">

                <a href="#" class="flex items-center font-semibold hover:text-purple-600 group focus:outline-none focus:ring focus:ring-gray-300 focus:ring-offset-2 hover:bg-gray-200 px-1 py-0.5 rounded hover:border-gray-300 border border-transparent {{ active('docs.api.*', 'text-purple-700') }}">
                    <x-icon-cloud-lightning class="w-5 h-5 ml-1 mr-2 text-current text-gray-600 group-hover:text-purple-600" /> API
                </a>

            </nav>
            <!-- /desktop nav -->
            
        </aside>

        <main class="flex-1 w-full">
            @yield('page')
        </main>

    </section>

@endsection