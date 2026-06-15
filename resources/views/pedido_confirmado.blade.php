@extends('layouts.app')

@section('title', 'Página en Construcción - Suplementos al fallo')

@section('content')

<!--Contenido de la pagina-->
<main class="flex-grow-1">

    <div class="container-fluid text-light mt-5">
        <div class="row px-3">
            <div class="col-md-6">
                <img src="{{ asset('imagenes/logos/exito_logo.png') }}" alt="Imagen de pedido confirmado" class="img-fluid rounded shadow-lg d-none d-md-block">
            </div>
            <div class="col-md-6">
                <h1 class="display-4">¡Pedido Confirmado!</h1>
                <p class="lead text-warning welcome-container">Gracias por tu compra. Estamos preparando tu pedido.</p>
                <p class="fw-bold text-light fs-4">Podes consultar el estado de tu pedido en la seccion "Mis Pedidos" presionando el botón
                    con tu nombre</p>
                <a href="{{ route('catalogo.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Volver al Catálogo
                </a>
            </div>
        </div>
    </div>
</main>
@endsection