<div x-data="{ open: false }" class="relative flex items-center justify-center">

        <!-- dropdown btn -->
        <button class="inline-block w-8 h-8 overflow-hidden bg-gray-200 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-500 disabled:cursor-wait" x-on:click="open=!open">

            <img src="{{ auth()->user()->avatar_url }}" class="object-cover w-full h-full rounded-full" x-data x-on:user-avatar-updated.window="$el.src = event.detail.avatar;">

            <span class="sr-only">Profile menu</span>

        </button>

        <!-- dropdown container -->
        <nav
            x-cloak
            x-show.transition="open" 
            x-on:click.outside="open=false"
            x-on:keydown.escape="open=false"
            class="absolute right-0 z-50 w-48 py-1 bg-white border border-gray-300 rounded shadow top-10">

            <!-- signed in as -->
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