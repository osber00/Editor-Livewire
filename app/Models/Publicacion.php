<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function imagenes()
    {
        return $this->morphToMany(Imagen::class, 'imagenable');
    }
}
