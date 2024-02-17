<div class="p-10 dark:text-white">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3 dark:text-gray-300">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 dark:bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3 dark:text-gray-300">Empresa:
                <span class="font-normal normal-case">{{ $vacante->empresa }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3 dark:text-gray-300">Último dia de postulación:
                <span class="font-normal normal-case">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3 dark:text-gray-300">Categoría:
                <span class="font-normal normal-case">{{ $vacante->categoria->categoria }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3 dark:text-gray-300">Salario:
                <span class="font-normal normal-case">{{ $vacante->salario->salario }}</span>
            </p>

        </div>
    </div>
    <div class="md:grid md:grid-cols-7 gap-7">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen vacante ' . $vacante->titulo }}">
        </div>

        <div class="md:col-span-5 mt-4 md:mt-0">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p class="overflow-y-auto md:max-h-96">{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 dark:bg-gray-700 border border-dashed dark:border-slate-800 p-5 text-center">
            <p>¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600 dark:text-indigo-400"
                    href="{{ route('register') }}">Obtén una cuenta y aplica a esta y otras vacantes</a></p>
        </div>
    @endguest

    {{-- Para llamar policy y que un dev no pueda crear vacante lo contrario seria con @can()--}}
        @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
        @endcannot
        
       
    
</div>
