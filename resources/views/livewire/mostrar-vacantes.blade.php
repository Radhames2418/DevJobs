<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    @forelse($vacantes as $vacante)
        <div class="p-6 text-gray-900 border-b dark:text-gray-100 md:flex md:items-center md:justify-between">
            <div class="leading-10">
                <a class="text-xl font-bold" href="">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{ $vacante->empresa }}
                </p>

                <p class="text-sm text-gray-500 my-2">último dia: {{ $vacante->ultimo_dia->format('d/m/y') }}</p>
            </div>

            <div class="flex flex-col items-stretch md:flex-row md:items-center gap-3 mt-5 md:mt-0">
                <a
                    href="#"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-sm  font-bold text-center">
                    Candidatos
                </a>

                <a
                    href="{{ route('vacantes.edit', $vacante) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-sm  font-bold text-center">
                    Editar
                </a>

                <a
                    href="#"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-sm  font-bold text-center">
                    Eliminar
                </a>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes</p>
    @endforelse
</div>

<div class="flex justify-center  mt-10">
    {{ $vacantes->links() }}
</div>
