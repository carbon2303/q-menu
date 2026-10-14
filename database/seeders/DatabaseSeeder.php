<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Platillo;
use App\Models\Orden;
use App\Models\OrdenDetalle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear 8 categorías
        Categoria::factory(8)->create();

        // Crear 40 platillos asociados a categorías existentes
        Platillo::factory(40)->create([
            'categoria_id' => Categoria::query()
                ->inRandomOrder()
                ->value('id'),
        ]);

        // Crear 15 pedidos con sus detalles
        $platillos = Platillo::all();

        for ($i = 0; $i < 15; $i++) {
            $orden = Orden::factory()->create([
                'total' => 0,
            ]);

            $total = 0;

            foreach ($platillos->random(rand(1, 4)) as $platillo) {
                $cantidad = rand(1, 3);
                $precio = (float) $platillo->precio;
                $subtotal = round($cantidad * $precio, 2);

                OrdenDetalle::factory()->create([
                    'orden_id' => $orden->id,
                    'platillo_id' => $platillo->id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precio,
                    'subtotal' => $subtotal,
                ]);

                $total += $subtotal;
            }

            $orden->update(['total' => round($total, 2)]);
        }
    }
}
