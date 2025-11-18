<nav id="menu-principal" class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-16">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="flex items-center gap-2">
      <img src="{{ asset('images/axol.png') }}" alt="Domo Gas" class="h-8 w-auto">
      <span class="text-lg font-semibold text-gray-800">DomoGas</span>
    </a>

    <!-- Links -->
    <div class="hidden md:flex items-center gap-6 text-gray-700 font-medium">
      <a href="{{ route('store.index') }}" class="hover:text-indigo-600">Tienda</a>
      <a href="{{ route('soluciones') }}" class="hover:text-indigo-600">Soluciones</a>
      <a href="{{ route('empresa') }}" class="hover:text-indigo-600">¿Quiénes somos?</a>
      @auth
        <a href="{{ route('cart.index') }}" class="hover:text-indigo-600">Carrito</a>
        <a href="{{ route('orders.index') }}" class="hover:text-indigo-600">Mis pedidos</a>
        @if (auth()->user()->is_admin)
          <a href="{{ route('admin.home') }}" class="hover:text-indigo-600">Admin</a>
        @endif
      @endauth
    </div>

    <!-- Actions -->
    <div class="hidden md:flex items-center gap-3">
      @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="px-3 py-2 border border-gray-300 rounded hover:bg-gray-100">Salir</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Registrarse</a>
      @endauth
    </div>
  </div>
</nav>

