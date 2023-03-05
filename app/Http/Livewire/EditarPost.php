<?php

namespace App\Http\Livewire;

use App\Models\Imagen;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class EditarPost extends Component
{
    public $publicacion;
    public $titulo;
    public $contenido;
    public $imagenes = [];

    public function mount(Publicacion $publicacion)
    {
        $this->publicacion = $publicacion;
        $this->titulo = $publicacion->titulo;
        $this->contenido = $publicacion->contenido;
    }
    public function render()
    {
        return view('livewire.editar-post');
    }

    public function addImagenes($path_imagen)
    {
        $this->imagenes[] = $path_imagen;
    }

    public function updatepublicacion()
    {
        $this->validate([
            'titulo' => 'required|min:3:max:250',
            'contenido' => 'required'
        ]);
        $publicacion = $this->publicacion;
        $publicacion->titulo = $this->titulo;
        $publicacion->slug = Str::slug($this->titulo);
        $publicacion->contenido = $this->contenido;
        $publicacion->save();

        if (sizeof($this->imagenes) > 0){
            foreach ($this->imagenes as $imagen){
                $img = Imagen::where('path',$imagen)->first();
                if (strpos($publicacion->contenido, $imagen)){
                    $img->update([
                        'imagenable_id' => $publicacion->id,
                        'imagenable_type' => Publicacion::class
                    ]);
                }else{
                    Storage::delete($imagen);
                    $img->delete();
                }
            }
        }

        return redirect()->route('showpublicacion',$publicacion->id);

    }
}
