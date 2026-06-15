<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Detalle_Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\CheckoutService;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = Carrito::with('detalle_carritos.producto')
            ->where('cliente_id', Auth::id())
            ->first();

        return view('carrito', compact('carrito'));
    }

    /**
     * Confirma el carrito, genera el pedido y descuenta el stock.
     */
    public function confirmar(Request $request, CheckoutService $checkoutService, $id = null)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'Debes iniciar sesión para confirmar el pedido.'], 401);
        }

        // Buscamos el carrito del usuario autenticado con sus detalles
        $carrito = Carrito::with('detalle_carritos')
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })
            ->where('cliente_id', $userId)
            ->first();

        // Validamos que el carrito exista y tenga productos
        if (!$carrito || $carrito->detalle_carritos->isEmpty()) {
            return response()->json(['error' => 'Tu carrito está vacío.'], 400);
        }

        try {
            $lugarEntrega = trim((string) $request->input('lugar_de_entrega', ''));

            if ($lugarEntrega === '') {
                $lugarEntrega = $request->input('metodo_entrega') === 'retiro'
                    ? 'Retiro en Local'
                    : 'Sin especificar';
            }

            // Delegamos la lógica al servicio
            $pedido = $checkoutService->processCheckout($carrito, $userId, $lugarEntrega);

            return view('pedido_confirmado', compact('pedido'));

        } catch (\Exception $e) {
            if ($e->getMessage() === 'stock_insuficiente') {
                return redirect()->route('carrito.producto_sin_stock')
                    ->with('productos_sin_stock', $carrito->detalle_carritos->map(function ($detalle) {
                        return [
                            'producto' => $detalle->producto,
                            'solicitado' => $detalle->cantidad,
                            'disponible' => $detalle->producto->stock,
                        ];
                    })->values());
            }

            return back()->with('error', $e->getMessage());
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
                'precio' => $producto->precio,
                'subtotal' => $producto->precio * $request->cantidad,
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

        return view('generar_pedido', compact('carrito'));
    }
}