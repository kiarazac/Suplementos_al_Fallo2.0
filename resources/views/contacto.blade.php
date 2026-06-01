@extends('layouts.app')

@section('title', 'Contacto - Suplementos al fallo')

@section('content')

    <!--Contenido de la pagina-->
    <main class="flex-grow-1">

        <div class="container-fluid text-center text-light mt-5">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('imagenes/fondos/seccionContacto_1.png') }}" alt="Dueño de la empresa" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('imagenes/fondos/seccionContacto_2.png') }}" alt="Información de contacto" class="img-fluid rounded shadow-lg">
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-6">
                    <h1 class="text-warning fw-bold welcome-container">CONTACTO DIRECTO DESDE NUESTRA PÁGINA</h1> <!-- Título de la sección -->
                    <p class="fs-3 mt-3">¿Tienes alguna pregunta? ¡Estamos aquí para ayudarte!</p>
                    <div class="card bg-dark text-light border-0  px-5 mb-5 shadow-lg overflow-hidden">
                        <div class="card-body">
                            <form action="{{ url('/contacto') }}" method="POST">
                                @csrf

                                <div class="mb-3 text-start">
                                    <label class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresá tu nombre.
                                    </div>
                                </div>

                                <div class="mb-3 text-start">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        Ingresá un email válido.
                                    </div>
                                </div>

                                <div class="mb-3 text-start">
                                    <label class="form-label">Mensaje</label>
                                    <textarea class="form-control" name="mensaje" rows="4" required></textarea>
                                    <div class="invalid-feedback">
                                        El mensaje no puede estar vacío.
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning px-4">
                                        Enviar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        </div>

        <div class="container">
            <div




                </div>

    </main>

@endsection