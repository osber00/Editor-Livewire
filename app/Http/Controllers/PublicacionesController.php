<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicacionesController extends Controller
{
    public function publicaciones()
    {
        $publicaciones = Publicacion::all();
        return view('publicaciones',compact('publicaciones'));
    }

    public function nuevapublicacion()
    {
        return view('nuevapublicacion');
    }

    public function editarpublicacion(Request $request,Publicacion $publicacion)
    {
        return view('editarpublicacion',compact('publicacion'));
    }

    public function storepublicacion(Request $request)
    {
        $rules = [
            'titulo' => 'required|min:3|max:250',
            'contenido' => 'required'
        ];

        $this->validate($request,$rules);

        Publicacion::create([
            'titulo' => $request->titulo,
            'slug' => Str::slug($request->titulo),
            'contenido' => $request->contenido
        ]);

        return redirect()->route('publicaciones');
    }

    public function showpublicacion(Publicacion $publicacion)
    {
        return view('showpublicacion', compact('publicacion'));
    }

    /*Respuesta a CKEDITOR para subir imagen al servidor*/
    public function uploadimagenckeditor(Request $request)
    {
        $url = Storage::put('images',$request->file('imagen'));

        Imagen::create([
            'path' => $url
        ]);

        return response()->json([
            'url' => "/storage/".$url,
            'path' => $url
        ]);
    }
}
