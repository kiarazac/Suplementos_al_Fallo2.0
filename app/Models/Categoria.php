<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
    'nombreCategoria',
    'activa',
];
protected static function booted()
{
    static::updated(function ($categoria) {
        
        // Verificamos si cambió la columna 'activa'
        if ($categoria->isDirty('activa')) {
            
            // Usamos $categoria->activa para obtener el valor nuevo 
            // que acaba de ser guardado en la base de datos
            $nuevoEstado = $categoria->activa;
            
            // Actualizamos los productos usando el valor obtenido
            $categoria->productos()->update(['activo' => $nuevoEstado]);
        }
    });
}

public function productos()
{
    return $this->hasMany(Producto::class);
}
}

