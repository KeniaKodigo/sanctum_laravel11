<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//agrupar rutas protegidas
Route::middleware('auth:sanctum')->group(function() {
    //rutas
    Route::get('/v1/all', [ProductosController::class, 'index']);
    Route::get('/v1/products_user', [ProductosController::class, 'get_products_by_user']);
});

//creando una ruta para el login
Route::post('/v1/login', [AutenticacionController::class, 'login']);

//ruta donde validamos si la persona no ingreso token
Route::get('/error_token', function () {
    return response()->json(["message" => "Invalido Token"], 401);
})->name('login');
