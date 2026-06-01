@extends('layouts.app')

@section('title', 'Principal - Suplementos al fallo')

@section('content')

  <!--contenido de la pagina principal-->
  <div class="container-fluid">
    <h1 class="display-1 text-warning ">
      <div class="row justify-content-center">
        <div class="col-sm-8 rounded-pill bg-dark">
          <p>Suplementos al fallo</p>

        </div>

      </div>

    </h1>
    <div class="row mt-5">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="d-flex justify-content-center">

          <!-- 🟡 IMAGEN -->
          <img src="{{ asset('imagenes/logos/logo-home.png') }}" class="img-fluid shadow-lg" style="max-width: 505px;">
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Informacion de Comercializacion -->
      <div class="card-body p-4 border-dark rounded bg-dark text-white mx-auto fs-5"
        style="max-width: 1200px; text-align: justify;">

        <h4 class="text-warning welcome-container text-center text-uppercase mb-3"> Bienvenido a suplementos al fallo
        </h4>

        <p>
          ¡Bienvenido a Suplementos al Fallo! La mejor tienda online de nutrición deportiva. Sabemos que en el gimnasio no
          te guardás nada, por eso acá conseguís los productos de más alta calidad para mutar y llevar tu rendimiento al
          siguiente nivel. Proteínas, creatinas, pre-entrenos y todo el arsenal que necesitás de las mejores marcas.
          Entrená duro, nutrite mejor y llegá al fallo con los que saben.



        </p>
      </div>

    </div>

    <div class="w-60 justify-content-center rounded-pill">

      <h5 class="text-warning welcome-container text-center text-uppercase mb-3">Productos Destacados</h5>

    </div>



    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('imagenes/productos/Carousel/star-crea-FrutosRojos.jpeg') }}"
            class=" container-xl image-fluid" alt="Logo star">
          <div class="carousel-caption text-center text-warning d-md-block bg-dark bg-opacity-50 w-50 mx-auto rounded">
            <h5>PUREZA QUE SE SIENTE</h5>
            <p> <b> Elevá tus entrenamientos de la forma más limpia. Máxima pureza y rápida absorción para ganar fuerza real y
                masa muscular.</b> </b> </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('imagenes/productos/Carousel/psycho.jpeg') }}" class="container-xl image-fluid"
            alt="Logo psycho">
          <div class="carousel-caption text-center text-warning d-md-block bg-dark bg-opacity-50 w-50 mx-auto rounded">
            <h5>DESATÁ TU LOCURA</h5>
            <p><b> Olvidate de los límites. Cuando la motivación no alcanza, la demencia toma el control. Preparate para el
                bombeo más brutal de tu vida.</b></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('imagenes/productos/Carousel/gold.png') }}" class="container-xl image-fluid"
            alt="Logo slide3">
          <div class="carousel-caption text-center text-warning d-md-block bg-dark bg-opacity-50 w-50 mx-auto rounded">
            <h5>RECUPERACIÓN PREMIUM</h5>
            <p><b>Entrenar al fallo es solo la mitad del trabajo. Nutrí tus fibras con la mejor proteína del mercado.</b></p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div>


      <!---inician logos de marcas -->
      <h5 class="text-center text-dark mt-4 bg-white rounded-pill w-50 mx-auto">¡Descubre las mejores marcas de nuestros
        suplementos!

      </h5>

      <div class="container text-center mt-5 mb-5">
        <div class="row gx-5 ">
          <div class="col-lg-4">
            <div class="p-0 bg-light text-dark fs-5 w-75 mx-auto mb-3 " style="text-align: left;">

              <a href="/Productos-star">
                <img src="{{ asset('imagenes/logos/logo-star.png') }}" class="img-fluid bg-light " alt="Logo Star">
              </a>
              <p class="mx-3 mb-3">¿Dando tus primeros pasos en la suplementación deportiva? Sabemos que elegir tu primera
                prote o creatina
                puede ser difícil. Por eso te recomendamos esta marca: es la opción número uno para principiantes. Sus
                productos están diseñados para una asimilación rápida, dándote la energía y recuperación justa para que
                dejes de ser el nuevo y pases al siguiente nivel.</p>
              <div class="text-center ">

                <a href="/Productos-star" class="btn btn-dark mb-3">Ver catalogo de Star Nutrition</a>

              </div>

            </div>


          </div>
          <div class="col-lg-4">
            <div class="p-0 bg-light text-dark fs-5 w-75 mx-auto mb-3 " style="text-align: left;">

              <a href="/Productos-gold">
                <img src="{{ asset('imagenes/logos/logo-gold.png') }}" class="img-fluid bg-light " alt="Logo gold">
              </a>
              <p class="mx-3 mb-5"> Sabemos que llevar tu cuerpo
                al límite exige una
                mejor nutrición. Por eso te presentamos Gold Nutrition: el equilibrio perfecto para intermedios. Sus
                fórmulas premium están diseñadas para garantizar máxima pureza, dándote la potencia y recuperación exacta
                para que
                rompas estancamientos sin irte a los extremos.</p>
              <div class="text-center ">

                <a href="/Productos-gold" class="btn btn-dark mb-3">Ver catalogo de Gold Nutrition</a>

              </div>

            </div>


          </div>

          <div class="col-lg-4">
            <div class="p-0 bg-light text-dark fs-5 w-75 mx-auto mb-3 " style="text-align: left;">

              <a href="/Productos-insane">
                <img src="{{ asset('imagenes/logos/logo-insane.png') }}" class="img-fluid bg-light " alt="Logo gold">
              </a>
              <p class="mx-3 mb-3"> ¿Tu nivel de locura hace que los
                productos normales
                te queden chicos? Sabemos que dejás la vida tirando pesado.
                Por eso te traemos Insane
                Labz: la línea definitiva para los más dementes del gym. Sus
                fórmulas extremas están diseñadas para una estimulación brutal, dándote la
                energía y concentración explosiva para que vayas a mutar.</p>
              <div class="text-center ">

                <a href="/Productos-insane" class="btn btn-dark mb-3">Ver catalogo de Insane Labz</a>

              </div>

            </div>

          </div>
        </div>
        <div class="row mb-5 mt-5"></div>


      </div>
    </div>
  </div>

@endsection