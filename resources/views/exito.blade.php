@extends('layouts.app')

@section('title', 'Éxito - Suplementos al fallo')

@section('content')

    <!--Contenido de la pagina-->
    <main class="flex-grow-1">

        <div class="row">
            <div class="col-md-3 d-flex justify-content-start">
                <img src="{{ asset('imagenes/logos/exito_logo.png') }}" alt="Imagen de mensaje recibido" class="img-fluid rounded shadow-lg d-none d-md-block">
            </div>
            <div class="col-md-6">
                <h1 class="text-center mb-4">¡ Hola <strong class="text-warning">{{ $nombre }}</strong>! Recibimos tu mensaje.</h1>
                <p class="text-center mb-4 fw-bold fs-4">Un asesor comercial se pondrá en contacto con vos al correo <strong class="text-warning">{{ $email }}</strong>
                    <br>¡Muchas gracias!
                </p>
            </div>
        </div>

    </main>

@endsection