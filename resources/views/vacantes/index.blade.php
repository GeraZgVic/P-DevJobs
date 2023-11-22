<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('mensaje'))

            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm"
                id="mensaje">
                {{session('mensaje')}}
            </div>
                
            @endif

            <livewire:mostrar-vacantes/>
        </div>
    </div>
    @push('scripts')
        <script>
            setTimeout(() => {
                let mensaje = document.querySelector('#mensaje');
                if(mensaje) {
                    mensaje.style.display = 'none';
                    location.reload();
                }
            }, 3000);
            
        </script>
    @endpush
</x-app-layout>
