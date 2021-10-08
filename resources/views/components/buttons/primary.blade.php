@props([
    'tag' => 'button',
])

<{{ $tag }} {{ $attributes->merge(["class" => "rounded px-6 py-3 bg-purple-500 hover:bg-purple-600 font-semibold text-white hover:shadow transition duration-75 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-400 focus:shadow-inner disabled:opacity-50 disabled:bg-purple-600 disabled:cursor-wait selection:bg-gray-100 selection:text-gray-700"]) }} {{ $attributes }}>{{ $slot }}</{{ $tag }}>