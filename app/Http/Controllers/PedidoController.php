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

    public function listadoPedidos($id)
    {
        $pedidos = Pedido::with('detalle_pedidos.producto')
            ->where('cliente_id', $id)
            ->get();

        return view(
            'listado_pedidos',
            compact('pedidos')
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
        // SI NO EXISTE CARRITO → CREARLO
        if (!$pedido) {
            $pedido = Pedido::create([
                'cliente_id' => Auth::id(),
                'titular_compra' => Auth::user()->name, // <-- AGREGAMOS ESTO
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
        if ($detalle) {
            $detalle->cantidad += $request->cantidad;

            $detalle->subtotal =
                $detalle->cantidad
                * $producto->precio;

            $detalle->save();
        } else {
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

    public function eliminarUnDetalle($id)
    {
        $detalle = DetallePedido::findOrFail($id);

        $pedido = Pedido::findOrFail($detalle->pedido_id);

        $detalle->delete();
        
        if ($pedido->detalle_pedidos()->count() == 0) {
            $pedido->delete();
            // En vez de return back(), mandalo al catálogo
            return redirect()->route('catalogo.index');
        }
        return redirect()->back();
    }
    public function eliminarTodo($id)
    {
        $detalles = DetallePedido::where('pedido_id', $id)->get();

        $pedido = Pedido::findOrFail($id);

        foreach ($detalles as $detalle) {
            $detalle->delete();
        }

        if ($pedido->detalle_pedidos()->count() == 0) {
            $pedido->delete();
            // En vez de return back(), mandalo al catálogo
            return redirect()->route('catalogo.index')->with('info', 'Tu carrito está vacío.');
        }
    }
    public function pedidoSinConfirmar()
    {
        $pedido = Pedido::with('detalle_pedidos.producto')
            ->where('cliente_id', Auth::id())
            ->where('estado', 'carrito')
            ->first();

        if (!$pedido) {
            return redirect()->back()->with('error', 'No tienes un carrito activo');
        }

        return view('generar_pedido', compact('pedido'));
    }
    public function confirmarPedido($id, Request $request)
    {
        $pedido = Pedido::findOrFail($id);

        if ($pedido->estado == 'confirmado') {
            return redirect()->back()->with('error', 'El pedido ya ha sido confirmado');
        }
        $pedido->lugar_de_entrega = $request->lugar_de_entrega;
        $pedido->estado = 'confirmado';
        $pedido->save();

        // Usar 303 See Other para forzar que el navegador realice un GET al home
        return redirect()->route('catalogo.index')->setStatusCode(303)->with('success', 'Pedido confirmado correctamente');
    }

    public function entregarPedido($id){
        $pedido = Pedido::findOrFail($id);

        if ($pedido->estado == 'entregado') {
            return redirect()->back()->with('error', 'El pedido ya ha sido entregado');
        }
        $pedido->estado = 'entregado';
        $pedido->save();

        return redirect()->back();
    }
}