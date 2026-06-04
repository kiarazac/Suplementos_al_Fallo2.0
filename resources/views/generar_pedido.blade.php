@extends('layouts.app')

@section('title', 'Comercialización - Suplementos al fallo')
@section('body-class', 'carrito-fondo')

@section('content')
<div class="container py-5 text-light">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-dark p-4 rounded shadow">
            <h1 class="mb-4 text-center text-warning">Finalizar Pedido</h1>

            {{-- Resumen rápido del total --}}
            <div class="alert alert-secondary text-dark text-center">
                <h4>Total a abonar: <strong>${{ $pedido->total }}</strong></h4>
            </div>

            <form action="{{ route('carrito.confirmarPedido', $pedido->id) }}" method="POST">
                @csrf

                {{-- SELECCIÓN DE MÉTODO DE ENTREGA --}}
                <div class="mb-4">
                    <label for="metodo_entrega" class="form-label fw-bold">Método de Entrega:</label>
                    <select class="form-select form-select-lg" id="metodo_entrega" name="metodo_entrega" required>
                        <option value="" disabled selected>-- Seleccione una opción --</option>
                        <option value="retiro">Retiro por el local (Suplementos al fallo)</option>
                        <option value="envio">Envío a domicilio - Corrientes (Capital)</option>
                    </select>
                </div>

                {{-- BLOQUE: ENVÍO A DOMICILIO (Oculto por defecto) --}}
                <div id="bloque_envio" class="card text-dark bg-light mb-4 d-none">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><i class="bi bi-truck"></i> Datos de Entrega en Corrientes (Capital)</h5>
                        <p class="card-text text-muted small">Los envíos se realizan únicamente dentro de la Ciudad de Corrientes.</p>

                        {{-- Opciones de Dirección (Radio Buttons) --}}
                        <div class="mb-3 p-3 border bg-dark text-light rounded">
                            <label class="form-label fw-bold mb-3">¿Dónde enviamos tu pedido?</label>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="opcion_direccion" id="dir_registrada" value="registrada">
                                <label class="form-check-label" for="dir_registrada">
                                    A mi dirección registrada: <span class="text-danger fw-bold">{{ Auth::user()->direccion}}</span>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcion_direccion" id="dir_otra" value="otra">
                                <label class="form-check-label" for="dir_otra">
                                    Ingresar otra dirección
                                </label>
                            </div>
                        </div>

                        {{-- Input para la dirección final (Oculto hasta que se elija 'otra') --}}
                        <div id="bloque_input_direccion" class="mb-3 d-none">
                            <label for="lugar_de_entrega" class="form-label fw-bold text-danger">Escribe la nueva dirección de entrega:</label>
                            <input type="text" class="form-control border-danger" id="lugar_de_entrega" name="lugar_de_entrega" placeholder="Ej: Junín 1234, Piso 2 Depto B">
                        </div>
                    </div>
                </div>

                {{-- BLOQUE: RETIRO POR LOCAL (Oculto por defecto) --}}
                <div id="bloque_retiro" class="card text-dark bg-light mb-4 d-none">
                    <div class="card-body">
                        <h5 class="card-title text-success"><i class="bi bi-geo-alt"></i> Información de Retiro</h5>
                        <p class="card-text">Podés pasar a buscar tu pedido por nuestra sucursal central.</p>
                        <p class="mb-0"><strong>Dirección:</strong> Calle Junín 2145, Corrientes Capital.</p>
                        <p class="text-muted small">Horarios: Lunes a Sábados de 08:00 a 13:00 y de 16:30 a 21:00 hs.</p>
                    </div>
                </div>

                {{-- BOTÓN DE ENVÍO --}}
                <div class="row justify-content-center bg-dark">
                    <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-warning btn-lg fw-bold w-100 mb-3">
                            Confirmar y Registrar Pedido <i class="bi bi-check-circle"></i>
                        </button>
                        <a href="{{ route('carrito.index') }}" class="btn btn-outline-secondary text-light w-100">Volver al Carrito</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- LÓGICA JAVASCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectMetodo = document.getElementById('metodo_entrega');
        const bloqueEnvio = document.getElementById('bloque_envio');
        const bloqueRetiro = document.getElementById('bloque_retiro');

        const radioRegistrada = document.getElementById('dir_registrada');
        const radioOtra = document.getElementById('dir_otra');
        const bloqueInputDireccion = document.getElementById('bloque_input_direccion');
        const inputLugarEntrega = document.getElementById('lugar_de_entrega');

        // Traemos la dirección del usuario desde PHP de forma segura
        const direccionUsuario = @json(Auth::user()->direccion ?? '');

        // 1. Lógica principal al cambiar Método de Entrega
        selectMetodo.addEventListener('change', function() {
            if (this.value === 'envio') {
                bloqueEnvio.classList.remove('d-none');
                bloqueRetiro.classList.add('d-none');

                // Por defecto, seleccionamos la dirección registrada
                radioRegistrada.checked = true;
                bloqueInputDireccion.classList.add('d-none');
                inputLugarEntrega.value = direccionUsuario;
                inputLugarEntrega.removeAttribute('required');

            } else if (this.value === 'retiro') {
                bloqueRetiro.classList.remove('d-none');
                bloqueEnvio.classList.add('d-none');

                // Si retira en local, asignamos ese valor al input para la base de datos
                inputLugarEntrega.value = 'local';
                inputLugarEntrega.removeAttribute('required');
            }
        });

        // 2. Lógica si elige "Dirección Registrada"
        radioRegistrada.addEventListener('change', function() {
            if (this.checked) {
                bloqueInputDireccion.classList.add('d-none');
                inputLugarEntrega.value = direccionUsuario;
                inputLugarEntrega.removeAttribute('required');
            }
        });

        // 3. Lógica si elige "Otra Dirección"
        radioOtra.addEventListener('change', function() {
            if (this.checked) {
                bloqueInputDireccion.classList.remove('d-none');
                inputLugarEntrega.value = ''; // Limpiamos para que escriba
                inputLugarEntrega.setAttribute('required', 'required'); // Hacemos obligatorio el campo
                inputLugarEntrega.focus(); // Llevamos el cursor al input automáticamente
            }
        });
    });
</script>
@endsection