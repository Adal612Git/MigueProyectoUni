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

    <!-- Estilos compilados -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased overflow-hidden">
    <div class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden">

        {{-- 🌄 Fondo texturizado + movimiento parallax --}}
        <div class="absolute inset-0 bg-[url('/images/textura-beige.jpg')] bg-cover bg-center bg-fixed 
                    animate-slow-pan brightness-105 contrast-110"></div>

        {{-- ✨ Capa de calidez y luz difusa --}}
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(255,255,255,0.5)_0%,_rgba(245,227,195,0.8)_40%,_rgba(198,112,61,0.2)_100%)] 
                    mix-blend-soft-light opacity-90 backdrop-blur-[2px]"></div>

        {{-- 💫 Capa de iluminación en movimiento --}}
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(255,255,255,0.3),transparent_70%)] 
                    animate-light-move pointer-events-none"></div>

        {{-- Contenido dinámico (slot) --}}
        <div class="relative z-10 px-4 w-full flex flex-col items-center justify-center">
            {{ $slot }}
        </div>

    </div>
</body>
</html>
