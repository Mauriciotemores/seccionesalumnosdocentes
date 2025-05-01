<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Seccion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // 1. Crear secciones (solo con campos existentes)
        $secciones = [
            ['nombre' => 'Matemáticas Avanzadas', 'codigo' => 'MATH-401'],
            ['nombre' => 'Programación Web', 'codigo' => 'PROG-301'],
            ['nombre' => 'Bases de Datos', 'codigo' => 'DB-201'],
            ['nombre' => 'Inteligencia Artificial', 'codigo' => 'IA-501'],
            ['nombre' => 'Redes de Computadoras', 'codigo' => 'NET-350']
        ];

        foreach ($secciones as $seccionData) {
            Seccion::create($seccionData);
        }

        // 2. Crear alumnos (solo campos existentes)
        $alumnos = Alumno::factory()->count(50)->create([
            'matricula' => function() use ($faker) {
                return 'AL-' . str_pad($faker->unique()->numberBetween(1, 99999), 5, '0', STR_PAD_LEFT);
            }
        ]);

        // 3. Crear docentes (solo campos existentes)
        $docentes = Docente::factory()->count(8)->create([
            'cedula' => function() use ($faker) {
                return 'CED-' . $faker->unique()->numberBetween(10000, 99999);
            }
        ]);

        // 4. Asignar relaciones
        Seccion::all()->each(function ($seccion) use ($alumnos, $docentes) {
            $seccion->alumnos()->attach(
                $alumnos->random(rand(15, 25))->pluck('id')
            );
            
            $seccion->docentes()->attach(
                $docentes->random(rand(1, 3))->pluck('id')
            );
        });

        // 5. Crear usuario admin (solo campos existentes)
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@universidad.edu', // Asegúrate que este campo exista
            'password' => bcrypt('password123')
        ]);
    }
}