<?php

namespace App\Http\Livewire;

use App\Models\Imagen;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class CrearPost extends Component
{
    public $titulo;
    public $contenido;
    public $imagenes = [];

    public function render()
    {
        return view('livewire.crear-post');
    }

    public function addImagenes($path_imagen)
    {
        $this->imagenes[] = $path_imagen;
    }

    public function guardarpublicacion()
    {
        $this->validate([
           'titulo' => 'required|min:3:max:250',
           'contenido' => 'required'
        ]);

        $publicacion = Publicacion::create([
            'titulo' => $this->titulo,
            'slug' => Str::slug($this->titulo),
            'contenido' => $this->contenido,
        ]);

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
