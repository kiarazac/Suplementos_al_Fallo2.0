@extends('layouts.app')

@section('title', 'Mis Pedidos - Suplementos al fallo')
@section('body-class', 'carrito-fondo')

@section('content')
<div class="container py-5">
    <div class="row">

        {{-- Lado Izquierdo: Listado de Pedidos --}}
        <div class="col-12 col-lg-6">
            <h1 class="text-warning fw-bold mb-4">
                <i class="bi bi-receipt"></i> MIS PEDIDOS
            </h1>

            @if($pedidos->isEmpty())
            <div class="alert alert-warning text-dark fw-bold border-0 shadow">
                Aún no has realizado ningún pedido.
            </div>
            @else
            {{-- Contenedor de las tarjetas con espacio entre ellas --}}
            <div class="d-flex flex-column gap-4">
                @foreach($pedidos as $pedido)
                <div class="card bg-dark border-warning shadow">

                    {{-- Cabecera de la Tarjeta --}}
                    <div class="card-header bg-black border-warning py-3">

                        <h4 class="mb-2 text-warning fw-bold">
                            Pedido # {{ $pedidos->count() - $loop->index }}
                        </h4>

                        @if($pedido->estado === 'carrito')
                        <span class="badge bg-info text-dark ms-2 fs-6">
                            En Carrito
                        </span>
                        @elseif($pedido->estado === 'confirmado')
                        <span class="badge bg-primary text-dark ms-2 fs-6">
                            Confirmado
                        </span>
                        @elseif($pedido->estado === 'entregado')
                        <span class="badge bg-success text-dark ms-2 fs-6">
                            Entregado
                        </span>
                        @endif
                        <span class="badge bg-light text-dark ms-2 fs-6">
                            Entrega en: {{ $pedido->lugar_de_entrega }}
                        </span>
                        <h5 class="mb-0 text-light mt-2">
                            Total: <span class="text-warning fw-bold">${{ $pedido->total }}</span>
                        </h5>
                    </div>

                    {{-- Cuerpo de la Tarjeta (Productos) --}}
                    <div class="card-body py-2">
                        <ul class="list-group list-group-flush">
                            @foreach($pedido->detalle_pedidos as $detalle)
                            <li class="list-group-item bg-transparent text-light border-secondary d-flex justify-content-between align-items-center px-1">
                                <span>
                                    <i class="bi bi-caret-right-fill text-warning small me-2"></i>
                                    {{ $detalle->producto->nombre }}
                                </span>
                                <span class="badge bg-secondary text-light rounded-pill fs-6">
                                   Precio Unit. ${{ $detalle->producto->precio }}
                                </span>
                                <span class="badge bg-warning text-dark rounded-pill fs-6">
                                    Cant: {{ $detalle->cantidad }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- Lado Derecho: Completamente vacío --}}
        <div class="col-12 col-lg-6 d-none d-lg-block">
            <img src="{{ asset('imagenes/logos/logo-listadoPedidos.png') }}"
                alt="Ilustración de pedidos"
                class="img-fluid opacity-75">
        </div>

    </div>
</div>
@endsection