<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'nombre',
        'activo'
    ];

    protected static function booted()
    {
        static::updated(function ($marca) {

            // isDirty() detecta CUALQUIER cambio (de 1 a 0, o de 0 a 1)
            if ($marca->isDirty('activo')) {

                // Le pasamos a los productos exactamente el mismo estado que ahora tiene la marca
                $marca->productos()->update(['activo' => $marca->activo]);
            }
        });
    }

    
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
