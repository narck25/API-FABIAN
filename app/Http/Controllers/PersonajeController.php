<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onepiece;

/* Controlador web para personajes */
class PersonajeController extends Controller
{
    /* Crear personaje */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'fruit' => 'required|string',
            'haki' => 'required|string',
            'age' => 'required|integer',
            'bounty' => 'required|integer',
        ]);

        /* Crear usando modelo */
        $character = Onepiece::create($request->all());

        if ($character) {
            return redirect('/personajes')->with('success', 'Personaje creado exitosamente');
        } else {
            return back()->withErrors(['error' => 'Error al crear el personaje']);
        }
    }

    /* Actualizar personaje */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'fruit' => 'required|string',
            'haki' => 'required|string',
            'age' => 'required|integer',
            'bounty' => 'required|integer',
        ]);

        /* Buscar y actualizar */
        $character = Onepiece::find($id);
        if (!$character) {
            return back()->withErrors(['error' => 'Personaje no encontrado']);
        }

        $character->update($request->all());

        return redirect('/personajes')->with('success', 'Personaje actualizado exitosamente');
    }

    /* Eliminar personaje */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        /* Buscar y eliminar */
        $character = Onepiece::find($request->id);
        if (!$character) {
            return back()->withErrors(['error' => 'Personaje no encontrado']);
        }

        $character->delete();

        return redirect('/personajes')->with('success', 'Personaje eliminado exitosamente');
    }
}
