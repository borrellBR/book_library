<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});



Route::apiResource('libros', LibroController::class);
// Ruta para mostrar el html:

Route::get('/', function () {
  return redirect('/libros.html');
});
