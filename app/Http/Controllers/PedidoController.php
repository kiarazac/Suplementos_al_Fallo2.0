<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    {
        $pedido = Pedido::with('detalle_pedidos.producto')
            ->where('cliente_id', Auth::id())
            ->where('estado', 'carrito')
            ->first();

        return view(
            'carrito',
            compact('pedido')
        );
    }
    public function show(Producto $producto)
    {
        return view(
            'productos.show',
            compact('producto')
        );
    }
    public function agregar(Request $request)
{
    $request->validate([

        'producto_id' => 'required|exists:productos,id',

        'cantidad' => 'required|integer|min:1'

    ]);

    $producto = Producto::findOrFail(
        $request->producto_id
    );

    $pedido = Pedido::where(
        'cliente_id',
        Auth::id()
    )
    ->where('estado', 'carrito')
    ->first();

    // SI NO EXISTE CARRITO → CREARLO
    if (!$pedido)
    {
        $pedido = Pedido::create([

            'cliente_id' => Auth::id(),

            'estado' => 'carrito',

            'total' => 0

        ]);
    }

    // BUSCAR SI EL PRODUCTO YA EXISTE EN EL CARRITO
    $detalle = DetallePedido::where(
        'pedido_id',
        $pedido->id
    )
    ->where(
        'producto_id',
        $producto->id
    )
    ->first();

    // SI YA EXISTE → SUMAR CANTIDAD
    if ($detalle)
    {
        $detalle->cantidad += $request->cantidad;

        $detalle->subtotal =
            $detalle->cantidad
            * $producto->precio;

        $detalle->save();
    }
    else
    {
        // SI NO EXISTE → CREAR DETALLE
        DetallePedido::create([

            'pedido_id' => $pedido->id,

            'producto_id' => $producto->id,

            'cantidad' => $request->cantidad,

            'subtotal' =>
                $producto->precio
                * $request->cantidad,
            'estado' => 'carrito',
            'precio_unitario' => $producto->precio

        ]);
    }

    // ACTUALIZAR TOTAL DEL PEDIDO
    $pedido->total +=
        $producto->precio
        * $request->cantidad;

    $pedido->save();

    return back();
}

    public function eliminar($id)
    {
        $detalle = DetallePedido::findOrFail($id);

        $pedido = $detalle->pedido;

        $detalle->delete();

        if ($pedido->detalle_pedidos()->count() == 0) {
            $pedido->delete();
        }

        return back();
    }
}
