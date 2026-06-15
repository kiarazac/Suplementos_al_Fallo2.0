<?php

use App\Http\Controllers\ControladorS_A_F;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('Home');
})->name('home');


Route::get('/carrito', [CarritoController::class, 'index'])
    ->name('carrito.index');

Route::post(
    '/carrito/agregar',
    [CarritoController::class, 'agregar']
)->middleware('auth')
    ->name('carrito.agregar');

Route::delete(
    '/carrito/eliminar/{id}',
    [CarritoController::class, 'eliminarUnDetalle']
)->name('carrito.eliminarUnDetalle');

Route::delete(
    '/carrito/eliminarTodo/{id}',
    [CarritoController::class, 'eliminarTodo']
)->name('carrito.eliminarTodo');

Route::get('/carrito/generar_pedido', [CarritoController::class, 'carritoSinConfirmar'])
    ->middleware('auth') // <-- AGREGAR ESTO
    ->name('carrito.carritoSinConfirmar');

Route::post('/carrito/confirmar_pedido', [CarritoController::class, 'confirmar'])
    ->middleware('auth')
    ->name('carrito.confirmar');

Route::get('/carrito/pedido_confirmado', function () {
    return view('pedido_confirmado');
});


Route::get('/carrito/producto_sin_stock', function () {
    return view('producto_sin_stock');
})->name('carrito.producto_sin_stock');

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

// Esta es la ruta que recibe el formulario
Route::post('/logout', function (Request $request) {
    Auth::logout(); // 1. Cierra la sesión
    $request->session()->invalidate(); // 2. Invalida la sesión actual
    $request->session()->regenerateToken(); // 3. Regenera el token de seguridad

    return redirect('/'); // 4. Te manda de vuelta a la página principal
});

Route::get(
    '/registro',
    [AuthController::class, 'showRegister']
);

Route::post(
    '/registro',
    [AuthController::class, 'register']
);

Route::get('/Comercializacion', function () {
    return view('Comercializacion');
});

Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones');
});

Route::get('/productos-insane', function () {
    return view('Productos-insane');
});

Route::get('/contacto', function () {
    return view('contacto');
});





Route::get(
    '/catalogo',
    [CatalogoController::class, 'index']
)->name('catalogo.index');

Route::get('/listado_pedidos/{id}', [PedidoController::class, 'listadoPedidos'])
    ->middleware('auth')->name('listado_pedidos');

Route::post('/contacto', [App\Http\Controllers\ConsultaController::class, 'enviar'])
->name('consultas.enviar');


// 1. NUEVA RUTA PARA ACTIVAR (Debe ir primero)
// Todo lo que esté dentro de este grupo pasará por tu AdminMiddleware
Route::middleware([AdminMiddleware::class])->group(function () {
    
    // 1. EL DUEÑO DEL PANEL: ProductoController dibuja la pantalla en /panel_admin
    Route::resource('/panel_admin', ProductoController::class)->names('panel_admin');
    Route::patch('/pedidos_Admin/{id}/entregar', [PedidoController::class, 'entregarPedido'])->name('pedidos.entregar');

    // 2. RUTAS DE ACCIÓN DE MARCAS (Reciben datos, operan y redireccionan)
    Route::patch('/marcas_Admin/{id}/activate', [MarcasController::class, 'activate'])->name('marcas.activate');
    Route::resource('marcas_Admin', MarcasController::class)->names('marcas');

    // 3. RUTAS DE ACCIÓN DE CATEGORÍAS (Reciben datos, operan y redireccionan)
    Route::patch('/categorias_Admin/{id}/activate', [CategoriasController::class, 'activate'])->name('categorias.activate');
    Route::resource('categorias_Admin', CategoriasController::class)->names('categorias');

    Route::get('consultas_Admin', [App\Http\Controllers\ConsultaController::class, 'index'])->name('consultas.index');

    // =======================================================
    // 4. NUEVAS RUTAS DE GESTIÓN DE USUARIOS
    // =======================================================
    Route::patch('/usuarios_Admin/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('usuarios.makeAdmin');
    Route::patch('/usuarios_Admin/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('usuarios.removeAdmin');
    Route::delete('/usuarios_Admin/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::get('/usuarios_Admin/crear-admin', [UserController::class, 'createAdminForm'])->name('usuarios.createAdmin');

});
