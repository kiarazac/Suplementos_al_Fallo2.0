@extends('layouts.app')

@section('title', 'Sobre nosotros - Suplementos al fallo')

@section('content')

  <div class="container-fluid">

    <!-- 🔵 SECCIÓN 1 -->
    <div class="row align-items-center"
      style="background-image: url('{{ asset('imagenes/fondos/local_suplementos_al_fallo.png') }}');
       background-size: cover;
       background-position: center;
       min-height: 100vh;
       ">

      <div class="col-md-6"></div>

      <div class="col-md-6 d-flex justify-content-end">
        <div class="card bg-dark text-warning p-4 shadow-lg me-5" style="max-width: 400px;">

          <div class="card-header text-center fs-4 fw-bold">
            ¿Quiénes somos y por qué elegirnos?
          </div>

          <div class="card-body fs-5">
            <p>
              En <b>Suplementos al Fallo</b> somos especialistas en
              suplementación deportiva de alta calidad.
              Te brindamos la confianza y el respaldo de una
              década de trayectoria, consolidándonos como el
              <b>máximo referente de la región</b>.
            </p>
          </div>

        </div>
      </div>

    </div> <!-- ✅ CIERRE SECCIÓN 1 -->


    <!-- 🔵 SECCIÓN 2 -->
    <div class="row align-items-center"
      style="
       background-image: url('{{ asset('imagenes/fondos/quienesSomos_2.png') }}');
       background-size: cover;
       background-position: center;
       min-height: 100vh;
       ">

      <div class="col-md-6"></div>

      <div class="col-md-6 d-flex justify-content-end">
        <div class="card bg-dark text-warning p-4 shadow-lg me-5" style="max-width: 400px;">

          <div class="card-header text-center fs-4 fw-bold">
            NUETRA MISIÓN
          </div>

          <div class="card-body fs-5">
            <p>
              Potenciar tu rendimiento con la mejor relación <b>calidad-precio</b> del
              mercado.<br><BR> No te vendemos fórmulas mágicas, te ofrecemos <b>asesoramiento
                personalizado</b> real para que cada suplemento sea el combustible
              exacto que tu cuerpo necesita para superar tus límites.
            </p>
          </div>

        </div>
      </div>

    </div> <!-- ✅ CIERRE SECCIÓN 2 -->


    <!-- 🔵 SECCIÓN 3 -->
    <div class="row align-items-center text-center"
      style="
     background-image: url('{{ asset('imagenes/fondos/quienesSomos_3.jpg') }}');
     background-size: cover;
     background-position: center;
     min-height: 100vh;
     ">
      <div class="row"></div>
      <div class="row g-5 px-3">

        <!-- CARD IZQUIERDA -->
        <div class="col-12 col-md-4 d-flex justify-content-center">
          <div class="card bg-dark text-warning shadow-lg p-2 w-100" style="max-width: 300px;">
            <div class="card-header text-center fs-4 fw-bold text-uppercase">
              Staff
            </div>
            <div class="card-body text-center fs-5">
              <p>
                <b>Nicolas Pini</b><br>
                (Fundador y Personal Trainer)
              </p>
            </div>
          </div>
        </div>

        <!-- BOTÓN -->
        <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
          <a href="/catalogo"  class="w-100 d-flex justify-content-center">
            <button type="button" class="btn btn-warning fw-bold fs-5 text-uppercase px-4 py-3">
              Conocé nuestros productos
            </button>
          </a>
        </div>

        <!-- CARD DERECHA -->
        <div class="col-12 col-md-4 d-flex justify-content-center">
          <div class="card bg-dark text-warning shadow-lg p-2 w-100" style="max-width: 300px;">
            <div class="card-header text-center fs-4 fw-bold text-uppercase">
              Staff
            </div>
            <div class="card-body fs-5 text-center" >
              <p>
                <b>Kiara Zacarias</b><br>
                (Marketing y Nutricionista)
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
