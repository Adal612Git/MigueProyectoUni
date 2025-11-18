<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Domo Gas – Detección Inteligente de Gas LP</title>
    <meta name="description" content="Solución IoT para la detección temprana de fugas de gas LP. Seguridad 24/7 para tu hogar o negocio.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-[var(--domogas-dark-brown)]">

    <div class="min-h-screen flex flex-col">

        {{-- 1. HEADER --}}
        @if (View::exists('layouts.partials.menu'))
            @include('layouts.partials.menu')
        @else
            <header class="bg-[var(--domogas-beige)] py-4 text-center shadow animate__animated animate__fadeInDown">
                <h1 class="text-xl font-bold text-[var(--domogas-dark-brown)]">Domo Gas</h1>
            </header>
        @endif

        {{-- 2. HERO SECTION (imagen izquierda / texto derecha) --}}
        <section id="hero" class="flex flex-col md:flex-row items-center justify-center text-center md:text-left py-24 px-6 md:px-20 bg-soft-domogas gap-10">

            {{-- 🎨 Imagen escolta --}}
            <div class="animate__animated animate__fadeInLeft">
                <img src="{{ asset('images/escolta-sensor.png') }}" 
                     alt="Sensor DomoGas ilustración"
                     class="w-64 md:w-96 h-auto drop-shadow-2xl rounded-2xl">
            </div>

            {{-- 🧠 Texto principal --}}
            <div class="max-w-2xl animate__animated animate__fadeInRight">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--domogas-dark-brown)] mb-4 leading-tight">
                    Protección contra Fugas de Gas LP
                </h2>

                <p class="text-lg text-[var(--domogas-dark-brown)]/80">
                    DomoGas te ofrece un sensor que <strong>no solo detecta fugas de gas LP</strong>,  
                    sino que también alerta con una <strong>alarma sonora y luz parpadeante</strong>,  
                    para garantizar que todos en tu hogar puedan reaccionar a tiempo.  
                    <br><br>
                    Su instalación rápida, costo accesible y diseño inteligente  
                    te brindan seguridad sin complicaciones.
                </p>
            </div>
        </section>

        {{-- 3. SECCIÓN SEGURIDAD INTEGRAL (texto izquierda / imagen derecha) --}}
        <section id="seguridad" class="flex flex-col-reverse md:flex-row items-center justify-center text-center md:text-left py-24 px-6 md:px-20 bg-white/80 backdrop-blur-sm gap-10">

            {{-- 🧠 Texto principal --}}
            <div class="max-w-2xl animate__animated animate__fadeInLeft">
                <h3 class="text-3xl md:text-4xl font-semibold mb-4 text-[var(--domogas-dark-brown)]">
                    Seguridad Integral 24/7
                </h3>
                <p class="text-lg text-[var(--domogas-dark-brown)]/80">
                    Los sensores DomoGas se conectan a tu red Wi-Fi y envían notificaciones en tiempo real  
                    directamente a tu app móvil.  
                    <br><br>
                    Supervisa tu hogar o negocio desde cualquier lugar,  
                    manteniendo la tranquilidad de saber que tu entorno está protegido  
                    las 24 horas del día.
                </p>
            </div>

            {{-- 🎨 Imagen decorativa --}}
            <div class="animate__animated animate__fadeInRight">
                <img src="{{ asset('images/familia.png') }}" 
                     alt="Seguridad Integral DomoGas"
                     class="w-64 md:w-96 h-auto drop-shadow-2xl rounded-2xl">
            </div>
        </section>

        {{-- 4. CTA FINAL (único botón principal) --}}
        <section id="cta-final" class="py-20 text-center bg-gradient-domogas animate__animated animate__fadeInUp animate__slow">
            <h3 class="text-3xl md:text-4xl font-semibold mb-4">Protege lo que más importa</h3>
            <p class="mb-8 text-white/90 text-lg max-w-2xl mx-auto">
                Instala sensores Domo Gas y vive con la tranquilidad de una detección confiable  
                y monitoreo inteligente todos los días.
            </p>
            <a href="/register" class="btn-domogas">
                Comenzar ahora
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

    </div>

</body>
</html>
