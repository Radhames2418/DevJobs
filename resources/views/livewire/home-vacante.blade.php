<div>
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-3xl text-gray-700 mb-12">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 mt-5">
                @forelse($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5 mb-6 border-b">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600" href="{{ route('vacantes.show', $vacante->id) }}">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{ $vacante->empresa }}</p>
                            <p class="font-bold text-xs text-gray-600">
                                Último dia para postularse:
                                <span class="font-normal">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-slate-800 text-white p-3 text-sm uppercase font-bold rounded-md block text-center" href="{{ route('vacantes.show', $vacante->id) }}">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
