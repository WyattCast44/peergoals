@props([
    'icon', 
    'title',
    'padding' => true,
])

<section class="bg-white border border-gray-300 rounded shadow-sm">

    <div class="flex items-center px-4 py-2 space-x-2 font-semibold text-gray-700 border-b border-gray-200 rounded-t select-none bg-gray-50">
        @svg($icon, 'w-4 h-4 mr-1') <p>{{ $title }}</p>
    </div>

    <main class="{{ ($padding) ? 'px-4 py-3 md:px-8 md:py-4' : '' }}" {{ $attributes }}>
        {{ $slot }}
    </main>

</section>