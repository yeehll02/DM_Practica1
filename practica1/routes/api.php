<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Endpoint hola mundo
Route::get( 'holamundo', function () {
    return 'Hola Mundo --  Yesica Andrea Henao Ceballos';
});

Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'login']);
Route::Resource('/mascotas', MascotaController::class) -> middleware('auth:sanctum'); 