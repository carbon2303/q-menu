<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Platillo extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'disponible',
    ];

    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2',
            'disponible' => 'boolean',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detallesOrden(): HasMany
    {
        return $this->hasMany(OrdenDetalle::class);
    }
}