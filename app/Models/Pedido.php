<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
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

    public function detalle_pedidos()
    {
        return $this->hasMany(
            DetallePedido::class
        );
    }
}
