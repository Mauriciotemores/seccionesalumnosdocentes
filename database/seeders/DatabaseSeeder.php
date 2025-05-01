<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Seccion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear secciones
        $secciones = Seccion::factory()->count(5)->create();

        // Crear alumnos
        $alumnos = Alumno::factory()->count(20)->create();

        // Crear docentes
        $docentes = Docente::factory()->count(5)->create();

        // Asignar alumnos y docentes a secciones
        $secciones->each(function ($seccion) use ($alumnos, $docentes) {
            $seccion->alumnos()->attach(
                $alumnos->random(rand(5, 10))->pluck('id')->toArray()
            );
            
            $seccion->docentes()->attach(
                $docentes->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
