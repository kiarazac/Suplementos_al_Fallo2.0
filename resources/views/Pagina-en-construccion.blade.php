@extends('layouts.app')

@section('title', 'Página en Construcción - Suplementos al fallo')

@section('content')

    <!--Contenido de la pagina-->
    <main class="flex-grow-1">

        <div class="container-fluid text-light mt-5">
            <div class="row px-3">
                <div class="col-md-6">
                    <h1 class="display-4">Página en construcción</h1>
                    <p class="lead text-warning welcome-container">Confiá en el proceso...</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('imagenes/logos/construccion_logo.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </main>

@endsection