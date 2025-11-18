<x-guest-layout>
  <div class="relative min-h-screen flex flex-col items-center justify-center gap-10 px-6 
              bg-[url('/images/textura-beige.jpg')] bg-cover bg-center bg-fixed 
              overflow-hidden backdrop-blur-md">



    {{-- 🧾 FORMULARIO DE LOGIN --}}
    <div class="z-10 w-full max-w-md p-8 rounded-3xl shadow-xl border border-[rgba(198,112,61,0.2)] 
                bg-white/70 backdrop-blur-md animate__animated animate__fadeInDown">

        <div class="text-center mb-8">
            <img src="{{ asset('images/axol.png') }}" alt="DomoGas" 
                 class="w-16 h-auto mx-auto mb-3 opacity-90 animate__animated animate__fadeInDown">
            <h1 class="text-2xl font-extrabold text-[var(--domogas-dark-brown)]">
              Bienvenido a DomoGas
            </h1>
            <p class="text-[var(--domogas-dark-brown)]/70 text-sm mt-1">
              Inicia sesión para acceder a tu cuenta
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo electrónico -->
            <div>
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    placeholder="tucorreo@domogas.com"
                    required autofocus />
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
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordarme y enlace -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[var(--domogas-clay)] shadow-sm focus:ring-[var(--domogas-clay)]" name="remember">
                    <span class="ml-2 text-sm text-[var(--domogas-dark-brown)]/70">{{ __('Recordarme') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-[var(--domogas-clay)] hover:text-[var(--domogas-terracotta)] font-medium" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <!-- Botón principal -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center bg-[var(--domogas-clay)] hover:bg-[var(--domogas-terracotta)]">
                    {{ __('Iniciar sesión') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Registro -->
        <p class="mt-6 text-center text-sm text-[var(--domogas-dark-brown)]/70">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-[var(--domogas-clay)] font-medium hover:text-[var(--domogas-terracotta)]">
              Regístrate aquí
            </a>
        </p>
    </div>

    {{-- 📜 Footer --}}
    <div class="mt-10 text-center text-xs text-[var(--domogas-dark-brown)]/60 z-10 animate__animated animate__fadeIn animate__delay-2s">
        © {{ date('Y') }} DomoGas — Seguridad Inteligente 24/7
    </div>
  </div>
</x-guest-layout>
