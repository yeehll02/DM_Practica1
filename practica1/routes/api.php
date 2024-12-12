<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoint hola mundo
Route::get( '/holamundo', function () {
    return 'Hola Mundo --  Yesica Andrea Henao Ceballos';
});

//Endpoint para el registro y el ingreso
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'login']);

//Endpoint para listar todos los items paginados
Route::get('/mascotas', [MascotaController::class, 'index']);

//Endpoints de la entidad Mascota, para los metodos CRUD.
Route::Resource('/mascotas', MascotaController::class) ->except(['index'])->middleware('auth:sanctum'); 