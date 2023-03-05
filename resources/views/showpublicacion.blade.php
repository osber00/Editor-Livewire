<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de publicación') }} | <a href="{{route('publicaciones')}}" class="text-white text-sm bg-gray-800 hover:bg-gray-900 px-5 py-2.5 mr-2 mb-2 rounded-md">Publicaciones</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative px-6 py-6 overflow-x-auto shadow-md sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{$publicacion->titulo}}</h2>
                    <div>
                        {!! $publicacion->contenido !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
