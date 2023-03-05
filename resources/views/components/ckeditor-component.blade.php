<div class="mb-6">
    <label for="contenido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Contenido de la publicación</label>
    <div wire:ignore

         x-data="{
                    contenido : @entangle('contenido'),
                 }"
         x-init="
                  ClassicEditor
                    .create($refs.contenido,{
                        extraPlugins: [ MyCustomUploadAdapterPlugin ],
                    }).then(editor => {
                        editor.model.document.on('change:data',() => {
                            contenido = editor.getData();
                        });
                    })
                    .catch( error => {
                        console.error( error );
                    });
                    "
    >
        {{--Componente para renderizar ckeditor--}}
        @isset($contenido)
            <div x-ref="contenido">{!! $contenido !!}</div>
        @else
            <div x-ref="contenido"></div>
        @endisset
    </div>

    {{--@dump($imagenes)--}}
</div>
