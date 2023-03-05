<?php

namespace Database\Seeders;

use App\Models\Publicacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatosPruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->publicaciones();
    }

    protected function publicaciones()
    {
        for ($i=1; $i<=15; $i++){
            $titulo = 'Titulo '.$i.' de publicación de prueba';
            Publicacion::create([
                'titulo' => $titulo,
                'slug' => Str::slug($titulo),
                'contenido' => 'Suspendisse ut arcu et erat dignissim pulvinar. Mauris egestas vel felis a semper. Vivamus gravida nulla et dui varius placerat. Vestibulum ornare nisl lobortis diam dignissim, vel elementum ligula euismod. Praesent aliquam velit non orci faucibus, viverra molestie libero ultrices. Nulla ac euismod purus, eu molestie ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce urna sapien, ultricies sed justo in, hendrerit pharetra quam.'
            ]);
        }
    }
}
