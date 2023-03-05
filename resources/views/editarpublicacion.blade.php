<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Publicación') }} | <a href="{{route('publicaciones')}}" class="text-white text-sm bg-gray-800 hover:bg-gray-900 px-5 py-2.5 mr-2 mb-2 rounded-md">Publicaciones</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @livewire('editar-post',['publicacion' => $publicacion])
                    {{--<livewire:editar-post :publicacion="$publicacion">--}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
