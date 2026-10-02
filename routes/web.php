<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\EgresoController;
Route::resource('egresos', EgresoController::class);

use App\Http\Controllers\VehiculoController;
Route::resource('vehiculos', VehiculoController::class);
