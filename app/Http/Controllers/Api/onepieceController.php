<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Onepiece;
use Illuminate\Support\Facades\Validator;


class onepieceController extends Controller
{
    public function index1()
    {
        return view(".layouts/index");
    }

    /* GET /api/onepiece - Listar personajes */
    public function index()
    {
        $onepiece = OnePiece::all();
        if ($onepiece->isEmpty()) {
            return response()->json([
                "error" => "error",
                "message" => "No se encontro a la tripulacion"
            ], 200);
        }
        return response()->json($onepiece, 200);
    }

    /* POST /api/onepiece - Crear personaje */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'fruit' => 'required',
            'haki' => 'required',
            'age' => 'required',
            'bounty' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Datos incorrectos',
                'error' => $validator->errors()
            ], 400);
        }
        $character = Onepiece::create([
            'name' => $request->name,
            'role' => $request->role,
            'fruit' => $request->fruit,
            'haki' => $request->haki,
            'age' => $request->age,
            'bounty' => $request->bounty,
        ]);
        if (!$character) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear el personaje'
            ], 500);
        }

        return response()->json($character, 201);
    }

    public function show(string $id)
    {
        $character = OnePiece::find($id);
        if (!$character) {
            return response()->json([
                'status' => 'error',
                'message' => 'Personaje no encontrado'
            ], 404);
        }
        return response()->json($character, 200);
    }

    /* PATCH /api/onepiece/{id} - Actualizar parcialmente */
    public function updatepart(Request $request, string $id)
    {
        $character = OnePiece::find($id);
        if (!$character) {
            return response()->json([
                'status' => 'error',
                'message' => 'Personaje no encontrado'
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string',
            'role' => 'sometimes|string',
            'fruit' => 'sometimes|string',
            'haki' => 'sometimes|string',
            'age' => 'sometimes|numeric',
            'bounty' => 'sometimes|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al validar los datos',
                'errors' => $validator->errors()
            ], 400);
        }
        if ($request->has('name')) {
            $character->name = $request->name;
        }
        if ($request->has('role')) {
            $character->role = $request->role;
        }
        if ($request->has('fruit')) {
            $character->fruit = $request->fruit;
        }
        if ($request->has('haki')) {
            $character->haki = $request->haki;
        }
        if ($request->has('age')) {
            $character->age = $request->age;
        }
        if ($request->has('bounty')) {
            $character->bounty = $request->bounty;
        }
        $character->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Personaje actulizado parcialmente con existo',
            'data' => $character
        ], 200);
    }

    /* DELETE /api/onepiece/{id} - Eliminar personaje */
    public function delete(string $id)
    {
        $character = OnePiece::find($id);
        if (!$character) {
            return response()->json([
                'status' => 'error',
                'message' => 'Personaje no encontrado'
            ], 404);
        }
        $character->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Personaje eliminado'
        ], 200);
    }

    /* PUT /api/onepiece/{id} - Actualizar completo */
    public function update(Request $request, $id)
    {
        $character = OnePiece::find($id);
        if (!$character) {
            return response()->json([
                'status' => 'error',
                'message' => 'Personaje no encontrado',
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'fruit' => 'required',
            'haki' => 'required',
            'age' => 'required',
            'bounty' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro al validar los datos',
                'errors' => $validator->errors()
            ], 400);
        }
        $character->name = $request->name;
        $character->role = $request->role;
        $character->fruit = $request->fruit;
        $character->haki = $request->haki;
        $character->age = $request->age;
        $character->bounty = $request->bounty;

        $character->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Personaje actulizado con exitos',
            'data' => $character
        ], 200);
    }
}
