<?php
namespace App\Services;

use App\Models\Carrito;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Exception;

class CheckoutService
{
    // Agregamos $lugarEntrega como tercer parámetro
    public function processCheckout(Carrito $carrito, $userId, $lugarEntrega)
    {
        // Iniciamos la transacción
        return DB::transaction(function () use ($carrito, $userId, $lugarEntrega) {
            
            // 1. Crear el Pedido (incluyendo los campos correctos de tu BD)
            $pedido = Pedido::create([
                'cliente_id'       => $userId, // Cambiado de 'user_id' a 'cliente_id' según tus controladores anteriores
                'total'            => $carrito->total, 
                'estado'           => 'confirmado', // Cambiado de 'status' a 'estado' según tus controladores anteriores
                'lugar_de_entrega' => $lugarEntrega // <-- NUEVO CAMPO ASIGNADO
            ]);

            // 2. Procesar los items del carrito (Corregido a 'detalle_carrito' en minúsculas)
            foreach ($carrito->detalle_carrito as $detalle_carrito) {
                
                // BLOQUEO PESIMISTA: Bloqueamos la fila del producto en MariaDB
                $producto = Producto::where('id', $detalle_carrito->producto_id)
                                  ->lockForUpdate()
                                  ->first();

                // Verificamos si hay stock suficiente (Corregido de 'quantity' a 'cantidad')
                if ($producto->stock < $detalle_carrito->cantidad) {
                    throw new Exception("Stock insuficiente para el producto: {$producto->nombre}");
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

            // 5. Eliminar los detalles y el carrito (Corregido a tu relación exacta)
            $carrito->detalle_carrito()->delete(); 
            $carrito->delete(); 

            // Si llegamos aquí, todo salió bien.
            return $pedido;
        });
    }
}