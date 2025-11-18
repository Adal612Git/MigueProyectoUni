{{-- 3. SECCIÓN PRODUCTO --}}
<section id="producto" class="relative py-24 px-6 bg-white/80 backdrop-blur-sm overflow-hidden">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12">

    {{-- Imagen del producto --}}
    <div class="relative flex-1 flex justify-center animate__animated animate__fadeInLeft">
      <div class="absolute -z-10 w-72 h-72 bg-[radial-gradient(circle,_rgba(255,150,80,0.25)_0%,_transparent_70%)] blur-3xl animate-pulse-slow"></div>
      <img src="{{ asset('images/familia.png') }}" 
           alt="Sensor inteligente DomoGas"
           class="w-80 h-auto drop-shadow-[0_20px_40px_rgba(0,0,0,0.25)] animate-float-smooth">
    </div>

    {{-- Texto descriptivo --}}
    <div class="flex-1 text-center md:text-left animate__animated animate__fadeInRight">
      <h3 class="text-3xl font-bold text-[var(--domogas-dark-brown)] mb-4">
        Seguridad inteligente para tu hogar 
      </h3>
      <p class="text-[var(--domogas-dark-brown)]/80 leading-relaxed mb-6 max-w-lg">
        Nuestro sensor <strong>DomoGas</strong> detecta fugas de gas LP y te alerta al instante.  
        No solo emite una <strong>alarma sonora</strong>, sino también una <strong>luz parpadeante</strong>  
        que facilita la detección para todos los integrantes de la familia.
      </p>
      <p class="text-[var(--domogas-dark-brown)]/80 leading-relaxed mb-8 max-w-lg">
        Su instalación sencilla y su bajo consumo de energía te permiten proteger tu hogar  
        sin comprometer tu economía, garantizando tranquilidad las 24 horas del día.
      </p>
      <a href="/register" class="btn-domogas animate__animated animate__fadeInUp animate__delay-1s">
        Adquiere el tuyo
      </a>
    </div>
  </div>
</section>
