<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DomoGas') }}</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Estilos y scripts compilados por Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen bg-gray-50">
        @if (View::exists('layouts.partials.menu'))
            @include('layouts.partials.menu')
        @endif
        <!-- Header slot -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Main content -->
        <main>
            @if (session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
                </div>
            @endif
            @if (session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
                </div>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>
</html>
