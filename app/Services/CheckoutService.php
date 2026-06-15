<?php
namespace App\Services;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Exception;

class CheckoutService
{
    // Agregamos $lugarEntrega como tercer parámetro
    public function processCheckout(Carrito $carrito, $userId, $lugarEntrega)
    {
        // Iniciamos la transacción
        return DB::transaction(function () use ($carrito, $userId, $lugarEntrega) {
            $productosSinStock = [];
            
            // 1. Crear el Pedido (incluyendo los campos correctos de tu BD)
            $pedido = Pedido::create([
                'cliente_id'       => $userId, // Cambiado de 'user_id' a 'cliente_id' según tus controladores anteriores
                'total'            => $carrito->total, 
                'estado'           => 'confirmado',
                'titular_compra'   => $carrito->titular_compra, 
                'lugar_de_entrega' => $lugarEntrega // <-- NUEVO CAMPO ASIGNADO
            ]);

            // 2. Procesar los items del carrito (Corregido a 'detalle_carrito' en minúsculas)
            foreach ($carrito->detalle_carritos as $detalle_carrito) {
                
                // BLOQUEO PESIMISTA: Bloqueamos la fila del producto en MariaDB
                $producto = Producto::where('id', $detalle_carrito->producto_id)
                                  ->lockForUpdate()
                                  ->first();

                // Verificamos si hay stock suficiente antes de crear el detalle del pedido
                if ($producto->stock < $detalle_carrito->cantidad) {
                    $productosSinStock[] = [
                        'producto' => $producto,
                        'solicitado' => $detalle_carrito->cantidad,
                        'disponible' => $producto->stock,
                    ];
                    continue;
                }

                // 3. Generar el detalle del pedido
                $pedido->detalle_pedidos()->create([
                    'producto_id'     => $producto->id,
                    'cantidad'        => $detalle_carrito->cantidad,
                    'precio_unitario' => $producto->precio, // Cambiado de 'precio' a 'precio_unitario' según tus controladores anteriores
                    'subtotal'        => $detalle_carrito->subtotal
                ]);

                // 4. Descontar el stock
                $producto->decrement('stock', $detalle_carrito->cantidad);
            }

            if (!empty($productosSinStock)) {
                throw new Exception('stock_insuficiente', 422);
            }

            // 5. Eliminar los detalles y el carrito solo si el checkout terminó correctamente
            $carrito->detalle_carritos()->delete();
            $carrito->delete();

            // Si llegamos aquí, todo salió bien.
            return $pedido;
        });
    }
}