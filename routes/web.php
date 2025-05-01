<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeccionController;

Route::resource('secciones', SeccionController::class)->only([
    'index', 'show'
]);

Route::post('secciones/{seccion}/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])
    ->name('secciones.asignar-alumnos');

Route::post('secciones/{seccion}/asignar-docentes', [SeccionController::class, 'asignarDocentes'])
    ->name('secciones.asignar-docentes');