<?php

namespace Database\Factories;

use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    protected $model = Docente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'cedula' => $this->faker->unique()->numerify('CED-#####'),
        ];
    }
}
