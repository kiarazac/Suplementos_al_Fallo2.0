@extends('layouts.app')

@section('title', 'Comercialización - Suplementos al fallo')
@section('body-class', 'carrito-fondo')

@section('content')
<div class="h-100">
    <h1>CARRITO DE COMPRAS</h1>
    <div class="container py-5">

        {{-- CONTENEDOR PRODUCTOS --}}
        <div class="container-fluid text-center text-light mt-5">

            <div class="row mb-3 gy-md-4 gx-md-0">



                @if(!$pedido)

                <div class="alert alert-warning text-center mt-5">

                    <h3>Tu carrito está vacío</h3>

                    <p>
                        Todavía no agregaste productos.
                    </p>

                </div>

                @else


                @foreach($pedido->detalle_pedidos as $detalle_pedido)
                <div class="col-6 col-md-4 d-flex justify-content-center">

                    <div
                        class="card mb-3 mt-3 h-100"
                        style="width: 18rem;">
                        {{-- IMAGEN --}}
                        <img

                            src="{{ asset($detalle_pedido->producto->imagen) }}"

                            class="card-img-top producto"

                            alt="{{ $detalle_pedido->producto->nombre }}">




                        <div class="card-body d-flex flex-column">




                            {{-- PRECIO --}}
                            <h5
                                class="card-title fw-bold text-black">

                                ${{ $detalle_pedido->subtotal }}

                            </h5>




                            <div class="mt-auto">




                                {{-- NOMBRE --}}
                                <p
                                    class="card-text text-black mb-2">

                                    {{ $detalle_pedido->producto->nombre }}

                                </p>
                                {{--CANTIDAD--}}
                                <p
                                    class="card-text text-black mb-2">

                                    Cantidad: {{ $detalle_pedido->cantidad }}

                                </p>
                                <p class="card-text text-black mb-2">
                                    Precio unitario: ${{ $detalle_pedido->producto->precio }}
                                </p>
                                <p>
                                    {{-- BOTÓN ELIMINAR --}}
                                <form action="{{ route('carrito.eliminar', $detalle_pedido->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>

                                </p>


                            </div>

                        </div>

                    </div>

                </div>
                @endforeach
                @endif
                @endsection