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

        if (!$carrito) {
        return view('carrito', compact('carrito'));
    }
        // --- NUEVO: RECALCULAR PRECIOS AL VUELO ---
        $nuevoTotalGeneral = 0;

        foreach ($carrito->detalle_carritos as $detalle) {
            // Obtenemos el precio actual directo de la tabla de productos
            $precioActual = $detalle->producto->precio;

            // Actualizamos el detalle en caso de que el admin haya cambiado el precio
            if ($detalle->precio != $precioActual) {
                $detalle->precio = $precioActual;
                $detalle->subtotal = $precioActual * $detalle->cantidad;
                $detalle->save();
            }

            // Vamos sumando el nuevo total real
            $nuevoTotalGeneral += $detalle->subtotal;
        }

        // Si el total cambió, lo actualizamos en la tabla carritos
        if ($carrito->total != $nuevoTotalGeneral) {
            $carrito->total = $nuevoTotalGeneral;
            $carrito->save();
        }
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
                'total' => 0,
               
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

        $productosBorrados = false;
        $nuevoTotalGeneral = 0;

        foreach ($carrito->detalle_carritos as $detalle) {

            // 1. Verificar si el producto ya NO está activo
            if ($detalle->producto->activo != 1) {
                $detalle->delete(); // Lo borramos directamente de la base de datos
                $productosBorrados = true;
                continue; // Cortamos esta vuelta del ciclo y pasamos al siguiente producto
            }

            // 2. Si sigue activo, recalculamos su precio (lo que hicimos en el paso anterior)
            $precioActual = $detalle->producto->precio;

            if ($detalle->precio != $precioActual) {
                $detalle->precio = $precioActual;
                $detalle->subtotal = $precioActual * $detalle->cantidad;
                $detalle->save();
            }

            // Sumamos al nuevo total general (solo los productos que sobrevivieron)
            $nuevoTotalGeneral += $detalle->subtotal;
        }

        // 3. Actualizamos el carrito
        if ($carrito->total != $nuevoTotalGeneral) {
            $carrito->total = $nuevoTotalGeneral;
            $carrito->save();
        }

        // 4. Si le borramos productos de su carrito, es buena práctica avisarle al usuario
        if ($productosBorrados) {
            // Si usas SweetAlert o alertas de Bootstrap, puedes mandar un mensaje flash
            session()->flash('info', 'Algunos productos de tu carrito ya no están disponibles y fueron removidos.');
        }
        return view('generar_pedido', compact('carrito'));
    }
}
