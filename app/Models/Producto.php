<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'activo',
        'categoria_id',
        'marca_id',
    ];

    public function detalle_pedidos()
{
    return $this->hasMany(
        DetallePedido::class
    );
}

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
 // ($fillable) Le dice a laravel que los campos que se pueden llenar masivamente a través de un array de datos