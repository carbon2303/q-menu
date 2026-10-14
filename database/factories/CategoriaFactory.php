<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement([
                'Entradas', 'Platos fuertes', 'Bebidas',
                'Postres', 'Ensaladas', 'Sopas',
                'Desayunos', 'Comida vegetariana',
            ]),
            'descripcion' => fake()->sentence(),
            'activa' => true,
        ];
    }
}
