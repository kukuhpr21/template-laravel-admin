<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ ucwords($title ?? config('app.name')) }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">

    @yield('css')
    @yield('js-up')

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-layout class="flex flex-row w-full h-screen overflow-auto">
        <livewire:partials.sidebar />
        <div class="flex flex-col w-full lg:pl-[270px] transition-all">
            <livewire:partials.navbar />

            <div class="py-4 m-2 rounded-lg h-screen overflow-auto scrollbar-hide">
                {{ $slot }}
            </div>
        </div>
    </x-layout>
    @livewireScripts
    @stack('scripts')
</body>
</html>
