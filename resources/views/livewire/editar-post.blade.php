<div>
    <form wire:submit.prevent="updatepublicacion" class="px-6 py-6">
        <div class="mb-6">
            <label for="titulo"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Título de la publicación</label>
            <input type="text" wire:model="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Título de la publicación" required>
        </div>

        <x-ckeditor-component :contenido="$contenido"></x-ckeditor-component>

        <div>
            <button type="submit" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirmar</button>
        </div>
    </form>

    @push('js')
        <x-adaptador-component></x-adaptador-component>
    @endpush
</div>
