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

                @if(!$carrito || $carrito->detalle_carritos->isEmpty())
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

                @foreach($carrito->detalle_carritos as $detalle_carrito)
                <div class="col-6 col-md-4 d-flex justify-content-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/' . $detalle_carrito->producto->imagen) }}" class="card-img-top producto" alt="{{ $detalle_carrito->producto->nombre }}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">${{ $detalle_carrito->subtotal }}</h5>

                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">{{ $detalle_carrito->producto->nombre }}</p>
                                <p class="card-text text-black mb-2">Cantidad: {{ $detalle_carrito->cantidad }}</p>
                                <p class="card-text text-black mb-2">Precio unitario: ${{ $detalle_carrito->producto->precio }}</p>

                                <form action="{{ route('carrito.eliminarUnDetalle', $detalle_carrito->id) }}" method="POST">
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
                        <h3 class="text-end text-light">Total: ${{ $carrito->total }}</h3>
                    </div>
                    <div class="col">
                        <form action="{{ route('carrito.eliminarTodo', $carrito->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Todo el Carrito
                            </button>
                        </form>
                    </div>
                </div>
       

                <a href="{{ route('carrito.carritoSinConfirmar') }}" class="btn btn-success">Confirmar Pedido</a>


                @endif 
            </div>
        </div>
    </div>
</div>
@endsection