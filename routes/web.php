<?php

use App\Http\Controllers\AvisoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OpinionController;


Route::get('/', function () {
    return view('opiniones.foro');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fotos', [App\Http\Controllers\FotoController::class, 'index'])->name('fotos');
Route::post('/subirFoto', [App\Http\Controllers\FotoController::class, 'subirFoto'])->name('subirFoto');
Route::get('/foto/{ruta}', [App\Http\Controllers\FotoController::class, 'mostrarFoto']);
Route::post('/eliminarFoto', [App\Http\Controllers\FotoController::class, 'eliminarFoto'])->name('eliminarFoto');
Route::post('/subirComentario', [App\Http\Controllers\FotoController::class, 'subirComentario'])->name('subirComentario');
Route::post('/eliminarComentario', [App\Http\Controllers\FotoController::class, 'eliminarComentario'])->name('eliminarComentario');
Route::post('/comentario/{id}/like', [LikeController::class, 'likeComentario'])->name('comentario.like');
Route::get('/enviarApi', [App\Http\Controllers\FotoController::class, 'enviarApi'])->name('enviarApi');

#Rutas del foro
Route::get('/opiniones/Mopiniones', [OpinionController::class, 'mostrarOpiniones'])->name('opiniones');
Route::get('/opiniones/crear', [OpinionController::class, 'formCrear'])->name('opiniones.crear'); 
Route::post('/opiniones/Almacenar', [OpinionController::class, 'crearOpinion'])->name('opiniones.almacenar');
Route::get('/aviso/avisos',[AvisoController::class,'RecuperarCliente'])->name('cliente.mostrar');