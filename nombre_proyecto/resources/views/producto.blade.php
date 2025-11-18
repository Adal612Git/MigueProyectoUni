<x-guest-layout>
    @include('layouts.menu')

    <section class="seccion-producto py-12">
        <div class="contenedor-producto max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="imagen-producto">
                <img src="https://via.placeholder.com/600x400" alt="Producto" class="rounded-lg shadow-lg">
            </div>
            <div class="info-producto">
                <h1 class="text-3xl font-bold text-domogas-dark mb-4">Nombre del Producto</h1>
                <p class="descripcion text-gray-700 mb-6">Aquí puedes escribir la descripción del producto...</p>
                <h3 class="text-xl font-semibold mb-2">Beneficios</h3>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Beneficio 1</li>
                    <li>Beneficio 2</li>
                    <li>Beneficio 3</li>
                </ul>
            </div>
        </div>
    </section>
</x-guest-layout>
