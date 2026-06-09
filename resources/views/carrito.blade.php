@extends('layouts.app')

@section('title', 'Comercialización - Suplementos al fallo')
@section('body-class', 'carrito-fondo')

@section('content')
<div class="h-100">
    <h1 class="text-center mt-4">CARRITO DE COMPRAS</h1>
    
    {{-- NUEVO: Bloque que muestra el titular de la compra --}}
    @auth
    <div class="text-center mt-2">
        <h4 class="text-warning">
            Titular de la compra: <span class="text-light fw-bold">{{ Auth::user()->name }}</span>
        </h4>
    </div>
    @endauth

    <div class="container py-4">

        {{-- CONTENEDOR PRODUCTOS --}}
        <div class="container-fluid text-center text-light mt-4">
            <div class="row mb-3 gy-md-4 gx-md-0">

                @if(!$pedido || $pedido->detalle_pedidos->isEmpty())
                <div class="row">
                    <div class="col">
                        <p>
                            <a href="{{ route('catalogo.index') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-left"></i> Seguir Comprando
                            </a>
                        </p>
                    </div>
                </div>
                <div class="alert alert-warning text-center mt-5">
                    <h3>Tu carrito está vacío</h3>
                    <p>Todavía no agregaste productos.</p>
                </div>

                @else

                <p>
                    <a href="{{ route('catalogo.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Seguir Comprando
                    </a>
                </p>

                @foreach($pedido->detalle_pedidos as $detalle_pedido)
                <div class="col-6 col-md-4 d-flex justify-content-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/' . $detalle_pedido->producto->imagen) }}" class="card-img-top producto" alt="{{ $detalle_pedido->producto->nombre }}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">${{ $detalle_pedido->subtotal }}</h5>

                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">{{ $detalle_pedido->producto->nombre }}</p>
                                <p class="card-text text-black mb-2">Cantidad: {{ $detalle_pedido->cantidad }}</p>
                                <p class="card-text text-black mb-2">Precio unitario: ${{ $detalle_pedido->producto->precio }}</p>
                                
                                <form action="{{ route('carrito.eliminarUnDetalle', $detalle_pedido->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row mt-5">
                    <div class="col"></div>
                    <div class="col">
                        <h3 class="text-end text-light">Total: ${{ $pedido->total }}</h3>
                    </div>
                    <div class="col">
                        <form action="{{ route('carrito.eliminarTodo', $pedido->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Todo el Carrito
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Corrección de la ruta para el botón (Cámbiala a GET en web.php si usas <a>) --}}
                <div class="row mt-3">
                    <div class="col">
                        <a href="{{ route('carrito.pedidoSinConfirmar') }}" class="btn btn-warning">
                            Finalizar Compra <i class="bi bi-check-lg"></i>
                        </a>
                    </div>
                </div>

                @endif {{-- Aquí cierra correctamente el único IF --}}
            </div>
        </div>
    </div>
</div>
@endsection