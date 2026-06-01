@extends('layouts.app')

@section('title', 'Comercialización - Suplementos al fallo')

@section('content')

  <!--Contenido de la pagina-->
  <main class="flex-grow-1">

    <div class="container-fluid text-center text-light mt-5 pb-5">
      <div class="row"></div>
      <div class="row"></div>
      <div class="row fw-bold text-warning">
        <h3>En Suplementos al Fallo, queremos que nada te detenga.
        </h3>
      </div>
      <div class="row fw-bold fs-1 text-light text-center align-items-center">
        <h4>
          Por eso, diseñamos un sistema de compra y entrega ágil para que tu
          única preocupación sea el entrenamiento.</h4>

      </div>

      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="d-flex justify-content-center">

            <!-- 🟡 IMAGEN -->
            <img src="{{ asset('imagenes/logos/logo-comercializacion1.png') }}"
              class="img-fluid shadow-lg"
              style="max-width: 505px;">
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Informacion de Comercializacion -->
        <div class="card-body p-4 border rounded bg-white text-dark mx-auto fs-5" style="max-width: 1200px; text-align: justify;">

          <h4><b>I. MODALIDADES DE ENTREGA</b></h4>
          <p>Contamos con dos opciones para que obtengas tus suplementos
            de la forma más cómoda:<br>
            <b>+ Retiro en Local:</b> Podés retirar tu pedido personalmente en nuestro
            local comercial ubicado en Calle Junín 2145, Corrientes Capital. Te esperamos
            para brindarte asesoramiento personalizado y despejar todas tus dudas.
            <br><b>+ Envíos a Domicilio:</b> Si preferís recibirlo en tu casa o gimnasio,
            contamos con un servicio de logística propio para todo el casco urbano de Corrientes
            Capital.<br><br>
          </p>

          <h4><b>II. TIEMPOS DE ENVIO</b></h4>
          <p>Sabemos que la constancia es clave, por eso garantizamos velocidad:<br>
            <b>+ Plazos:</b> Entregas garantizadas dentro de las 24 a 48 horas hábiles
            posteriores a la confirmación de tu compra.<br>
            <b>+ Zona de Cobertura:</b>Realizamos envíos a toda la ciudad de Corrientes Capital.<br>
            <b>+ Seguimiento:</b> Una vez procesado tu pedido, nuestro equipo se contactará con vos
            para coordinar el horario de entrega más conveniente.<br><br>
          </p>

          <h4><b>III.FORMAS DE PAGO</b></h4>
          <p>Aceptamos <b>todos los medios de pago</b> para que elijas el que mejor se adapte a vos:<br>
            <b>+ Tarjetas de Crédito y Débito:</b> Visa, MasterCard, American Express, entre otras.<br>
            <b>+ Transferencias Bancarias:</b> Podés realizar una transferencia a nuestra cuenta bancaria.
            Te proporcionaremos los datos necesarios al finalizar tu compra.<br>
            <b>+ Efectivo:</b> Si optás por el retiro en local, podés pagar en efectivo al momento de retirar tu pedido.<br>
            <b>+ Billeteras Virtuales:</b> Aceptamos pagos a través de billeteras virtuales como MercadoPago, PayPal, Ualá, Brubank
            entre otras.
          </p>
        </div>

      </div>

    </div>





  </main>

@endsection