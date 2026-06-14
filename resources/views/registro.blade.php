@extends('layouts.app')

@section('title', 'Registro - Al Fallo Store')

@section('content')

<div class="container pt-2 mt-1">
  <div class="row justify-content-center">

    <div class="col-12 col-md-8 col-lg-9">
      <div class="card bg-dark p-4 shadow-lg w-100 text-light mb-5">

        <img src="imagenes/logos/logo_solo_mascara.jpg"
          class="mb-3 mx-auto d-block rounded float-start"
          alt="logo" width="100">

        @if ($errors->any())

        <div class="alert alert-danger">

          <ul class="mb-0">

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

          </ul>

        </div>

        @endif
        <form
          class="row g-1"
          style="text-align: justify;"
          action="/registro"
          method="POST">

          @csrf
          <!-- Nombre -->
          <div class="col-md-4">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Tu nombre" required>
          </div>

          <!-- Apellido -->
          <div class="col-md-4">
            <label class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Tu apellido" required>
          </div>

          <!-- Email -->
          <div class="col-md-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="ejemplo@email.com" required>
          </div>

          <!-- Contraseña -->
          <div class="col-md-4">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="8">
          </div>

          <!-- Confirmar contraseña -->
          <div class="col-md-4">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="confirm_password" class="form-control" required minlength="8">
          </div>

          <!-- Dirección -->
          <div class="col-6">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
          </div>

          <!-- Ciudad -->
          <div class="col-md-6">
            <label class="form-label">Ciudad</label>
            <input type="text" name="ciudad" class="form-control" required>
          </div>

          <!-- País -->
          <div class="col-md-6">
            <label class="form-label">País</label>
            <input type="text" name="pais" class="form-control" required>
          </div>

          <!-- Checkbox -->
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="terminos" required>
              <label class="form-check-label">
                Acepto los
                <a href="/terminos-y-condiciones" class="text-decoration-underline">
                  términos y condiciones
                </a>
              </label>
            </div>
          </div>

          <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-warning px-4">
              Registrarse
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  var password = document.getElementById("password");
  var confirm_password = document.getElementById("confirm_password");

  function validarContraseñas() {
    if (password.value !== confirm_password.value) {
      confirm_password.setCustomValidity("Las contraseñas no coinciden");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validarContraseñas;
  confirm_password.onkeyup = validarContraseñas;
</script>
@endsection