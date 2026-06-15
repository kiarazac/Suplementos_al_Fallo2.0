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
            // Delegamos la lógica al servicio
            $pedido = $checkoutService->processCheckout($carrito, $userId, $request->lugar_de_entrega);

            // Si todo salió bien, redirigimos al éxito
            return redirect('/carrito/pedido_confirmado'); // O a tu listado de pedidos

        } catch (\Exception $e) {
            $mensajeError = $e->getMessage();
            
            // Intentamos decodificar el JSON que nos envió el CheckoutService
            $productosSinStock = json_decode($mensajeError);

            // Comprobamos si el error era nuestro JSON de falta de stock
            if (json_last_error() === JSON_ERROR_NONE && is_array($productosSinStock)) {
                
                // Redirigimos a TU ruta específica, enviando la variable de sesión que pide tu vista
                return redirect()->route('carrito.producto_sin_stock')
                                 ->with('productos_sin_stock', $productosSinStock);
            }

            // Si fue un error general de Base de Datos o código, lo mandamos atrás con el error crudo
            return redirect()->back()->with('error', 'Ocurrió un error inesperado: ' . $mensajeError);
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