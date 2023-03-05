<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('publicaciones',[PublicacionesController::class,'publicaciones'])->name('publicaciones');
Route::get('editarpublicacion/{publicacion}',[PublicacionesController::class,'editarpublicacion'])->name('editarpublicacion');
Route::get('nuevapublicacion',[PublicacionesController::class,'nuevapublicacion'])->name('nuevapublicacion');
Route::get('showpublicacion/{publicacion}',[PublicacionesController::class,'showpublicacion'])->name('showpublicacion');
Route::post('uploadimagenckeditor',[PublicacionesController::class,'uploadimagenckeditor'])->name('uploadimagenckeditor');
Route::post('storepublicacion',[PublicacionesController::class,'storepublicacion'])->name('storepublicacion');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
