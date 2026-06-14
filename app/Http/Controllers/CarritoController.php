<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Detalle_Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\CheckoutService;

class CarritoController extends Controller
{
    public function index()
    {
        $pedido = Carrito::with('detalle_carrito.producto')
            ->where('cliente_id', Auth::id())
            ->first();

        return view('carrito', compact('pedido'));
    }

    /**
     * Confirma el carrito, genera el pedido y descuenta el stock.
     */
    public function confirmar(Request $request, CheckoutService $checkoutService)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'Debes iniciar sesión para confirmar el pedido.'], 401);
        }

        // Buscamos el carrito del usuario autenticado con sus detalles
        $carrito = Carrito::with('detalle_carrito')
            ->where('cliente_id', $userId)
            ->first();

        // Validamos que el carrito exista y tenga productos
        if (!$carrito || $carrito->detalle_carrito->isEmpty()) {
            return response()->json(['error' => 'Tu carrito está vacío.'], 400);
        }

        try {
            // Delegamos la lógica al servicio
            $pedido = $checkoutService->processCheckout($carrito, $userId, $request->lugar_de_entrega);

            return response()->json([
                'mensaje' => 'Pedido generado correctamente.',
                'pedido' => $pedido
            ], 201);

            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No se pudo procesar el pedido.',
                'detalle' => $e->getMessage()
            ], 400);
        }
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        $carrito = Carrito::where('cliente_id', Auth::id())->first();

        // SI NO EXISTE CARRITO → CREARLO
        if (!$carrito) {
            $carrito = Carrito::create([
                'cliente_id' => Auth::id(),
                'titular_compra' => Auth::user()->name,
                'estado' => 'carrito',
                'total' => 0
            ]);
        }

        // BUSCAR SI EL PRODUCTO YA EXISTE EN EL CARRITO
        $detalle = Detalle_Carrito::where('carrito_id', $carrito->id)
            ->where('producto_id', $producto->id)
            ->first();

        // SI YA EXISTE → SUMAR CANTIDAD
        if ($detalle) {
            $detalle->cantidad += $request->cantidad;
            $detalle->subtotal = $detalle->cantidad * $producto->precio;
            $detalle->save();
        } else {
            // SI NO EXISTE → CREAR DETALLE
            Detalle_Carrito::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => $request->cantidad,
                'subtotal' => $producto->precio * $request->cantidad,
                'precio_unitario' => $producto->precio
            ]);
        }

        // ACTUALIZAR TOTAL DEL CARRITO
        $carrito->total += $producto->precio * $request->cantidad;
        $carrito->save();

        return back();
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function eliminarUnDetalle($id)
    {
        $detalle = Detalle_Carrito::findOrFail($id);

        $carrito = Carrito::findOrFail($detalle->carrito_id);

        $detalle->delete();
        
        if ($carrito->detalle_carritos()->count() == 0) {
            $carrito->delete();
            // En vez de return back(), mandalo al catálogo
            return redirect()->route('catalogo.index');
        }
        return redirect()->back();
    }
    public function eliminarTodo($id)
    {
        $detalles = Detalle_Carrito::where('carrito_id', $id)->get();

        $carrito = Carrito::findOrFail($id);

        foreach ($detalles as $detalle) {
            $detalle->delete();
        }

        if ($carrito->detalle_carritos()->count() == 0) {
            $carrito->delete();
            // En vez de return back(), mandalo al catálogo
            return redirect()->route('catalogo.index')->with('info', 'Tu carrito está vacío.');
        }
    }

    public function carritoSinConfirmar()
    {
        $carrito = Carrito::with('detalle_carritos.producto')
            ->where('cliente_id', Auth::id())
            ->first();

        if (!$carrito) {
            return redirect()->back()->with('error', 'No tienes un carrito activo');
        }

        return view('generar_carrito', compact('carrito'));
    }
}