@props([
    'tag' => 'button',
])

<{{ $tag }} {{ $attributes->merge(["class" => "rounded px-6 py-3 bg-gray-200 hover:bg-gray-300 font-semibold text-gray-700 hover:shadow transition duration-75 border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:shadow-inner disabled:opacity-50 disabled:bg-gray-400 disabled:cursor-wait disable:text-gray-600 selection:bg-purple-300"]) }} {{ $attributes }}>{{ $slot }}</{{ $tag }}>