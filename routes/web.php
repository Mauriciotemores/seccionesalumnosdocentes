<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeccionController;

// Ruta raíz que redirige al listado de secciones
Route::redirect('/', '/secciones')->name('home');

// Rutas para la gestión de secciones
Route::prefix('secciones')->group(function () {
    // Rutas básicas del controlador
    Route::resource('/', SeccionController::class)
        ->only(['index', 'show'])
        ->parameters(['' => 'seccion'])
        ->names([
            'index' => 'secciones.index',
            'show' => 'secciones.show'
        ]);
    
    // Rutas adicionales para asignaciones
    Route::post('/{seccion}/asignar-alumnos', [SeccionController::class, 'asignarAlumnos'])
        ->name('secciones.asignar-alumnos');
    
    Route::post('/{seccion}/asignar-docentes', [SeccionController::class, 'asignarDocentes'])
        ->name('secciones.asignar-docentes');
});