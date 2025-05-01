<?php

namespace Database\Factories;

use App\Models\Seccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeccionFactory extends Factory
{
    protected $model = Seccion::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'codigo' => $this->faker->unique()->bothify('SEC-###'),
        ];
    }
}
