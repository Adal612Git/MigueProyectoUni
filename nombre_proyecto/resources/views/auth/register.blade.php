<x-guest-layout>
  <div class="relative min-h-screen flex flex-col items-center justify-center px-6 
              bg-[url('/images/textura-beige.jpg')] bg-cover bg-center bg-fixed 
              overflow-hidden backdrop-blur-md">

    {{-- 🧾 FORMULARIO DE REGISTRO --}}
    <div class="z-10 w-full max-w-md p-8 rounded-3xl shadow-xl border border-[rgba(198,112,61,0.2)] 
                bg-white/70 backdrop-blur-md animate__animated animate__fadeInDown">

        <div class="text-center mb-8">
            <img src="{{ asset('images/axol.png') }}" alt="DomoGas" 
                 class="w-16 h-auto mx-auto mb-3 opacity-90 animate__animated animate__fadeInDown">
            <h1 class="text-2xl font-extrabold text-[var(--domogas-dark-brown)]">
                Crea tu cuenta DomoGas
            </h1>
            <p class="text-[var(--domogas-dark-brown)]/70 text-sm mt-1">
                Regístrate para comenzar tu experiencia
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="name" :value="__('Nombre completo')" />
                <x-text-input id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="old('name')"
                    placeholder="Tu nombre"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Correo electrónico -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    placeholder="tucorreo@domogas.com"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar contraseña -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Botón principal -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center bg-[var(--domogas-clay)] hover:bg-[var(--domogas-terracotta)]">
                    {{ __('Registrarse') }}
                </x-primary-button>
            </div>

            <!-- Enlace a iniciar sesión -->
            <p class="mt-6 text-center text-sm text-[var(--domogas-dark-brown)]/70">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-[var(--domogas-clay)] font-medium hover:text-[var(--domogas-terracotta)]">
                    Inicia sesión
                </a>
            </p>
        </form>
    </div>

    {{-- 🔥 FOOTER CON FUEGO --}}
    <footer class="absolute bottom-0 left-0 w-full h-48 overflow-hidden pointer-events-none">



        <p class="absolute top-0 left-0 w-full text-center text-xs text-[var(--domogas-dark-brown)]/80 mt-2 z-10 drop-shadow-md">
            © {{ date('Y') }} DomoGas — Seguridad Inteligente 24/7
        </p>
    </footer>

  </div>
</x-guest-layout>
