<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'numero',
        'nombre_cliente',
        'estado',
        'total',
    ];

    protected function casts(): array
    {
        return ['total' => 'decimal:2'];
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(OrdenDetalle::class);
    }
}
