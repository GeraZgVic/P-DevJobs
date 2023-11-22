<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a class="text-xl font-bold" href="{{route('vacantes.show',$vacante->id)}}">{{ $vacante->titulo }}</a>
                    <p class="text-sm text-gray-600 dark:text-gray-400 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-300 ">Último día:
                        {{ $vacante->ultimo_dia->format('d-m-Y') }}</p>
                </div>
                <div class="flex gap-3 items-center  mt-5 md:mt-0">
                    <a class="bg-slate-800 dark:bg-slate-100 py-2 px-4 rounded-lg text-white dark:text-black hover:bg-slate-700 dark:hover:bg-slate-300 text-xs font-bold uppercase"
                        href="{{route('candidatos.index', $vacante)}}">
                        {{$vacante->candidatos->count()}}
                        Candidatos
                    </a>
                    <a class="bg-blue-700 dark:bg-sky-500 py-2 px-4 rounded-lg text-white hover:bg-blue-800 dark:hover:bg-sky-600 text-xs font-bold uppercase"
                        href="{{ route('vacantes.edit', $vacante->id) }}"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>
                    <button type="button" wire:click="$dispatch('mostrarAlerta', {{$vacante->id}})"
                        class="bg-red-600 dark:bg-red-500 py-2 px-4 rounded-lg text-white  hover:bg-red-700 dark:hover:bg-red-600 text-xs font-bold uppercase"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm dark:text-gray-400">No hay vacantes que mostrar</p>
        @endforelse

        <div class="m-5">
            {{ $vacantes->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una Vacante eliminada no se puede recuperar:(",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire(
                            'Se eliminó la Vacante',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })

            });
        });
    </script>
     {{-- @this.on('eliminarVacante') --}}
@endpush
