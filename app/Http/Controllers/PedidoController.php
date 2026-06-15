<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Auth;



class PedidoController extends Controller
{
    

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