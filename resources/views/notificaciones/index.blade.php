<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("Publicar Vacante") }} --}}
                    <h1 class="text-3xl font-bold text-center mb-10 mt-2">Mis Notificaciones</h1>
                    <div class="divide-y divide-gray-200 dark:divide-gray-600">
                    @forelse ($notificaciones as $notificacion )
                        <div class="p-5 lg:flex lg:justify-between lg:items-center">
                            <div>
                                <p>Tienes un nuevo candidato en: 
                                    <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                </p>
                                <p class="font-bold">{{$notificacion->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="mt-5 lg:my-0 text-gray-100 uppercase text-sm">
                                <a href="{{route('candidatos.index', $notificacion->data['id_vacante'])}}" class=" bg-indigo-600 p-2 rounded-lg hover:bg-indigo-700">
                                    Ver Candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600 dark:text-gray-200">No Hay Notificaciones Nuevas</p>
                    @endforelse
                </div>
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>
