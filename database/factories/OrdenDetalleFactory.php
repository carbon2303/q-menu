<?php

namespace Database\Factories;

use App\Models\Orden;
use App\Models\Platillo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenDetalleFactory extends Factory
{
    public function definition(): array
    {
        $cantidad = fake()->numberBetween(1, 4);
        $precio = fake()->randomFloat(2, 35, 250);

        return [
            'orden_id' => Orden::factory(),
            'platillo_id' => Platillo::factory(),
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'subtotal' => round($cantidad * $precio, 2),
        ];
    }
}
