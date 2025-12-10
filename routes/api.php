<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\onepieceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/onepiece', [onepieceController::class,'index']);
Route::get('/onepiece/{id}', [onepieceController::class, 'show']);
Route::post('/onepiece', [onepieceController::class,'store']);
Route::put('/onepiece/{id}', [onepieceController::class,'update']);
Route::patch('/onepiece/{id}', [onepieceController::class,'updatepart']);
Route::delete('/onepiece/{id}', [onepieceController::class,'delete']);