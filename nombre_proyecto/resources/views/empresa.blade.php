<x-guest-layout>
    @if (View::exists('layouts.partials.menu'))
        @include('layouts.partials.menu')
    @endif

    <section class="py-12 bg-soft-domogas w-full">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-domogas-dark mb-6">¿Quiénes somos?</h1>

            <p class="text-gray-700 mb-6">
                Somos una compañía dedicada al desarrollo y distribución de soluciones tecnológicas orientadas a la seguridad residencial e industrial.
                Nos especializamos en sensores, alarmas y kits de detección temprana de fugas de gas y humo.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="card-domogas p-6">
                    <h3 class="text-xl font-semibold mb-2">Nuestra misión</h3>
                    <p class="text-gray-700">
                        Garantizar la protección de personas y bienes mediante equipos de detección confiables y de alto rendimiento.
                    </p>
                </div>
                <div class="card-domogas p-6">
                    <h3 class="text-xl font-semibold mb-2">Nuestra visión</h3>
                    <p class="text-gray-700">
                        Ser un referente nacional en soluciones de seguridad preventiva, ofreciendo productos innovadores y un servicio integral.
                    </p>
                </div>
            </div>

            <div class="card-domogas p-6">
                <h3 class="text-xl font-semibold mb-3">Nuestros valores</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Seguridad</li>
                    <li>Calidad</li>
                    <li>Innovación</li>
                    <li>Confianza</li>
                    <li>Atención al cliente</li>
                </ul>
            </div>
        </div>
    </section>
</x-guest-layout>

