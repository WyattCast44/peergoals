<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ config('app.meta.description') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="turbo-cache-control" content="no-cache">
    <title>{{ config('app.meta.title') }}</title>
    
    <!-- styles -->
    <style>[x-cloak] { display: none !important; }</style>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <livewire:styles />
</head>
<body class="text-gray-900 font-sans selection:bg-purple-100 antialiased @stack('body:classes')">

    @yield('body')
    
    @stack('footer')
    <livewire:scripts />
    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>