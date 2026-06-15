<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Carrito extends Model
{
    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad',
        'precio',
        'subtotal',
    ];
    public function carrito()
    {
        return $this->belongsTo(
            Carrito::class
        );
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
