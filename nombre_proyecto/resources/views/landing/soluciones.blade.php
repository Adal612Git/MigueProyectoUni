<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soluciones DomoGas – Seguridad Inteligente para tu Hogar</title>
    <meta name="description" content="Descubre las soluciones DomoGas para detectar fugas, alertar a tu familia y mantener tu hogar protegido 24/7.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans text-[var(--domogas-dark-brown)] bg-[var(--domogas-beige)]">
    
    {{-- HEADER (Navbar reutilizado) --}}
    @include('layouts.partials.menu')

    {{-- HERO DE SOLUCIONES --}}
    <section class="relative py-24 px-6 text-center bg-white/70 backdrop-blur-sm overflow-hidden">
        <h1 class="text-4xl md:text-5xl font-bold text-[var(--domogas-dark-brown)] mb-4 animate__animated animate__fadeInDown">
            Soluciones <span class="text-accent">DomoGas</span>
        </h1>
        <p class="text-lg text-[var(--domogas-dark-brown)]/80 max-w-2xl mx-auto animate__animated animate__fadeInUp animate__delay-1s">
            Protege lo que más importa con nuestras soluciones integrales para la detección y prevención de fugas de gas LP.
        </p>
    </section>

    {{-- SECCIÓN DE BENEFICIOS --}}
    <section class="py-20 px-6 bg-white/80 backdrop-blur-sm">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 text-center">

            <div class="card-domogas p-8 animate__animated animate__fadeInUp">
                <img src="{{ asset('images/alerta.gif') }}" alt="Alerta inmediata" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-accent mb-2">Alerta inmediata</h3>
                <p class="text-[var(--domogas-dark-brown)]/80">
                    Cuando se detecta una fuga, DomoGas activa una alarma sonora y una luz parpadeante visible para todos los integrantes del hogar.
                </p>
            </div>

            <div class="card-domogas p-8 animate__animated animate__fadeInUp animate__delay-1s">
                <img src="{{ asset('images/audio.gif') }}" alt="Monitoreo IoT" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-accent mb-2">Monitoreo IoT</h3>
                <p class="text-[var(--domogas-dark-brown)]/80">
                    Conéctalo a tu red Wi-Fi y recibe notificaciones desde tu app móvil con tecnología IoT segura y cifrada.
                </p>
            </div>

            <div class="card-domogas p-8 animate__animated animate__fadeInUp animate__delay-2s">
                <img src="{{ asset('images/familia.gif') }}" alt="Seguridad familiar" class="w-16 h-16 mx-auto mb-4">
                <h3 class="text-xl font-semibold text-accent mb-2">Seguridad familiar</h3>
                <p class="text-[var(--domogas-dark-brown)]/80">
                    Diseñado para brindar tranquilidad, permitiendo que toda la familia —niños, adultos mayores y mascotas— esté protegida.
                </p>
            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="py-20 text-center bg-gradient-domogas animate__animated animate__fadeInUp animate__slow">
        <h3 class="text-3xl md:text-4xl font-semibold mb-4">Lleva DomoGas a tu hogar</h3>
        <p class="mb-8 text-white/90 text-lg">Instala sensores inteligentes y ten la tranquilidad que tu familia merece.</p>
        <a href="/register" class="btn-outline bg-white text-[var(--domogas-clay)] font-semibold hover:bg-[var(--domogas-beige)] animate__animated animate__pulse animate__infinite">
            Adquirir solución
        </a>
    </section>
{{-- 5. FOOTER --}}
        @if (View::exists('layouts.partials.footer'))
            @include('layouts.partials.footer')
        @else
            <footer class="py-6 text-center text-sm text-[var(--domogas-dark-brown)]/70 bg-[var(--domogas-beige)] animate__animated animate__fadeInUp animate__delay-2s">
                © 2025 Domo Gas — Detección Inteligente de Gas LP
            </footer>
               @endif

</body>
</html>
