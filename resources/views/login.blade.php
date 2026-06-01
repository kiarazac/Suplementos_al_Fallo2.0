@extends('layouts.app')

@section('title', 'Inicio de Sesión - Al Fallo Store')

@section('content')

<!-- Contenido de la pagina -->
<main class="flex-grow-1">
  <div class="container">

    <!-- row: fila del sistema de grillas -->
    <!-- justify-content-center: centra las columnas -->
    <div class="row justify-content-center">

      <!--col-md-6: en tablets ocupa la mitad-->

      <div class="col-md-6">

        <!-- 
        card: componente de Bootstrap
        p-4: padding interno
        shadow-lg: sombra grande
        w-100: ocupa todo el ancho de la columna
        -->
        <div class="card bg-dark p-4 mt-5 mb-4 shadow-lg w-100 text-light">

          <!-- Título centrado -->
          <h2 class="mb-3 text-center fw-bold text-warning">
            Inicio de Sesión <br>

            <!-- Imagen -->
            <img src="imagenes/logos/logo_mascaracFondo.png"
              alt="logo"
              width="300"
              height="290">
          </h2>
          
          
          <!-- Formulario -->
          <form action="{{ route('login') }}" method="POST">
            @csrf

          <!-- Mostrar errores de validación -->
          @if ($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
          @endif

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email"
                class="form-control"
                name="email"
                required>
              <div class="invalid-feedback">
                Por favor, ingresá un email válido.
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password"
                class="form-control"
                name="password"
                required
                minlength="8">
            </div>

            <div class="d-flex justify-content-center mt-3">
              <button type="submit" class="btn btn-warning px-4">
                Iniciar Sesión
              </button>
            </div>

            <label class="form-label">¿Todavia no tienes cuenta? <a href="/registro">Registrate aquí</a></label>
          </form>
        </div>

      </div>
    </div>
</main>

@endsection