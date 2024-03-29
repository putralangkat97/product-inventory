<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventory Management System') }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
</head>

<body class="font-sans antialiased">

    <div class="flex flex-col lg:flex-row">
        {{-- sidebar --}}
        @include('layouts.partials.sidebar')

        <main class="w-full lg:mt-0 lg:ml-80 bg-white min-h-screen relative">
            <div class="py-6 md:py-8">
                <div class="w-full mx-auto px-4 lg:px-8">
                    <div class="flex justify-between mt-6 lg:mt-0 mb-4">
                        <div class="shrink-0 flex items-center">
                            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                                {{ $header ?? '' }}
                            </h2>
                        </div>

                        {{-- header --}}
                        @include('layouts.partials.header')
                    </div>

                    <div class="mt-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    @stack('modals')
    @livewireScripts
</body>

</html>
