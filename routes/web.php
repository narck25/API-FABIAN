<?php

use App\Http\Controllers\Api\onepieceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;
use App\Models\Onepiece;

/* Ruta principal */
Route::get('/', function () {
    return view('welcome');
});

/* Lista de personajes */
Route::get('/personajes', function () {
    $personajes = Onepiece::all();
    return view('index', compact('personajes'));
});

/* Formulario agregar */
Route::get('/personajes/agregar', function () {
    return view('personajes.agregar');
})->name('personajes.agregar');

/* Procesar agregar */
Route::post('/personajes/agregar', [PersonajeController::class, 'store'])->name('personajes.store');

/* Formulario editar */
Route::get('/personajes/modificar/{id}', function ($id) {
    $personaje = Onepiece::find($id);
    return view('personajes.modificar', compact('personaje'));
})->name('personajes.modificar');

/* Procesar editar */
Route::match(['post', 'put'], '/personajes/modificar/{id}', [PersonajeController::class, 'update'])->name('personajes.update');

/* Formulario eliminar */
Route::get('/personajes/eliminar', function () {
    return view('personajes.eliminar');
})->name('personajes.eliminar');

/* Procesar eliminar */
Route::post('/personajes/eliminar', [PersonajeController::class, 'destroy'])->name('personajes.destroy');
