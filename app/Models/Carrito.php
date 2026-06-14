<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = [
        'cliente_id',
        'total',
        'estado',
        'lugar_de_entrega',
        'titular_compra',
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }

    public function detalle_carritos()
    {
        return $this->hasMany(
            Detalle_Carrito::class
        );
    }
}