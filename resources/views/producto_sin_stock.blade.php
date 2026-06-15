@extends('layouts.app')

@section('title', 'Producto sin stock - Suplementos al fallo')

@section('content')
<main class="flex-grow-1">
    <div class="container-fluid text-light mt-5">
        <div class="row px-3">
            <div class="col-md-6">
                <img src="{{ asset('imagenes/logos/stock_insuficiente.png') }}" alt="Imagen de producto sin stock" class="img-fluid rounded shadow-lg d-none d-md-block">
            </div>
            <div class="col-md-6">
                <h1 class="display-4">¡Producto sin Stock!</h1>
                <p class="lead text-warning welcome-container">No podemos completar tu compra porque algunos productos del carrito no tienen stock suficiente.</p>

                <p class="fw-bold text-light fs-4">Te recomendamos revisar tu carrito y ajustar las cantidades o eliminar los productos que no estén disponibles.</p>
                <a href="{{ route('carrito.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Volver al Carrito
                </a>
            </div>
        </div>
        <div class="row mt-4"></div>
    </div>
</main>