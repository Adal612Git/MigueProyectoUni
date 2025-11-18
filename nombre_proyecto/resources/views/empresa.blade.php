<x-guest-layout>
    @include('layouts.menu')

    <section class="seccion-empresa py-12 bg-soft-domogas">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-domogas-dark mb-4">Nuestra Empresa</h1>
            <p class="text-gray-700 mb-6">Somos una compañía dedicada a ofrecer soluciones energéticas modernas y eficientes.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="card-domogas p-6">
                    <h3 class="text-xl font-semibold mb-2">Misión</h3>
                    <p class="text-gray-700">Brindar servicios de calidad y tecnología de punta.</p>
                </div>
                <div class="card-domogas p-6">
                    <h3 class="text-xl font-semibold mb-2">Visión</h3>
                    <p class="text-gray-700">Ser líderes en soluciones energéticas sostenibles.</p>
                </div>
                <div class="card-domogas p-6">
                    <h3 class="text-xl font-semibold mb-2">Valores</h3>
                    <p class="text-gray-700">Calidad, innovación y compromiso.</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
