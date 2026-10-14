<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero' => fake()->unique()->numerify('PED-######'),
            'nombre_cliente' => fake()->name(),
            'estado' => fake()->randomElement([
                'pendiente', 'preparando', 'entregada', 'cancelada',
            ]),
            'total' => 0,
        ];
    }
}
