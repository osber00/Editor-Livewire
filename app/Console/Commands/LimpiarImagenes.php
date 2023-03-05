<?php

namespace App\Console\Commands;

use App\Models\Imagen;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LimpiarImagenes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpiar directorio y DB de imagenes no asociadas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $imagenes = Imagen::where('imagenable_type',null)->get();
        foreach ($imagenes as $imagen){
            Storage::delete($imagen->path);
            $imagen->delete();
        }
    }
}
