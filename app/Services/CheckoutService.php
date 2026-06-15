<?php
namespace App\Services;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Exception;

class CheckoutService
{
    public function processCheckout(Carrito $carrito, $userId, $lugarEntrega)
    {
        return DB::transaction(function () use ($carrito, $userId, $lugarEntrega) {
            $productosSinStock = [];
            
            // 1. Crear el Pedido inicial
            $pedido = Pedido::create([
                'cliente_id'       => $userId,
                'total'            => $carrito->total, 
                'estado'           => 'confirmado',
                'titular_compra'   => $carrito->titular_compra ?? 'Consumidor Final', 
                'lugar_de_entrega' => $lugarEntrega
            ]);

            // 2. PRIMERA PASADA: Verificar el stock de TODO el carrito
            foreach ($carrito->detalle_carritos as $detalle_carrito) {
                // Bloqueo pesimista
                $producto = Producto::where('id', $detalle_carrito->producto_id)
                                  ->lockForUpdate()
                                  ->first();

                // Si falta stock de este producto, lo guardamos en nuestro array
                if ($producto->stock < $detalle_carrito->cantidad) {
                    // Creamos un objeto genérico para que tu vista Blade pueda leerlo con la flecha (->)
                    $productosSinStock[] = (object)[
                        'nombre'     => $producto->nombre,
                        'solicitado' => $detalle_carrito->cantidad,
                        'stock'      => $producto->stock,
                    ];
                }
            }

            // 3. Si encontramos AL MENOS UN producto sin stock, abortamos todo
            if (!empty($productosSinStock)) {
                // Lanzamos la excepción convirtiendo el array en formato JSON para poder leerlo en el controlador
                // Esto hace un "ROLLBACK" automático, borrando el Pedido que creamos en el paso 1.
                throw new Exception(json_encode($productosSinStock));
            }

            // 4. SEGUNDA PASADA: Como ya sabemos que hay stock de todo, creamos los detalles y descontamos
            foreach ($carrito->detalle_carritos as $detalle_carrito) {
                $producto = Producto::find($detalle_carrito->producto_id); // Ya está bloqueado por el paso 2

                $pedido->detalle_pedidos()->create([
                    'producto_id'     => $producto->id,
                    'cantidad'        => $detalle_carrito->cantidad,
                    'precio_unitario' => $producto->precio, 
                    'subtotal'        => $detalle_carrito->subtotal
                ]);

                // Descontar el stock
                $producto->decrement('stock', $detalle_carrito->cantidad);
            }

            // 5. Limpieza final
            $carrito->detalle_carritos()->delete();
            $carrito->delete();

            return $pedido;
        });
    }
}