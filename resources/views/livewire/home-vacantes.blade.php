<div>
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 dark:text-gray-300 mb-12">Nuestras Vacantes Disponibles</h3>
            <div
                class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200 dark:divide-gray-600">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacantes.show', $vacante->id) }}"
                                class="text-2xl font-extrabold text-gray-600 dark:text-gray-300">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-600 dark:text-gray-400 mb-1">{{$vacante->empresa}}</p>
                            <p class="text-base text-gray-600 dark:text-gray-400 mb-1">{{$vacante->categoria->categoria}}</p>
                            <p class="text-base text-gray-600 dark:text-gray-400 mb-1">{{$vacante->salario->salario}}</p>
                            <p class="text-gray-600 dark:text-gray-400 mb-3 font-medium text-sm">Último día para postularse:
                                <span class="font-normal"> {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-indigo-600 p-2 rounded-lg hover:bg-indigo-700 text-white text-sm font-bold uppercase block text-center"
                                href="{{ route('vacantes.show', $vacante->id) }}">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-sm text-center text-gray-600 dark:text-gray-400">No hay vacantes aún</p>
                @endforelse
            </div>
            <div class="m-5">
                {{ $vacantes->links() }}
            </div>
        </div>
    </div>
</div>
