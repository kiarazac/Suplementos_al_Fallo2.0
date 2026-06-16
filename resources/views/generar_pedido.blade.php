@extends('layouts.app')

@section('title', 'Finalizar Pedido - Suplementos al fallo')
@section('body-class', 'carrito-fondo')

@section('content')
<div class="container py-5 text-light">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-dark p-4 rounded shadow">
            @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show shadow-sm mb-4" role="alert">
                <strong>¡Aviso!</strong> {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h1 class="mb-4 text-center text-warning">Finalizar Pedido</h1>

            {{-- Resumen rápido del total --}}
            <div class="alert alert-secondary text-dark text-center">
                <h4>Total a abonar: <strong>${{ $carrito->total }}</strong></h4>
            </div>
            
            @php
                $direccionUsuario = Auth::user()?->direccion;
            @endphp

            <form id="form-confirmar-pedido" action="{{ route('carrito.confirmar', ['id' => $carrito->id]) }}" method="POST" data-direccion-usuario="{{ $direccionUsuario ?? '' }}">
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
                        <h5 class="card-title text-primary"><i class="bi bi-truck"></i> Datos de Entrega</h5>
                        <p class="card-text text-muted small">Los envíos se realizan únicamente dentro de la Ciudad de Corrientes.</p>

                        <div class="mb-3 p-3 border bg-dark text-light rounded">
                            <label class="form-label fw-bold mb-3">¿Dónde enviamos tu pedido?</label>

                            {{-- Solo mostramos esta opción si el usuario realmente tiene una dirección en la BD --}}
                            @if($direccionUsuario)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="opcion_direccion" id="dir_registrada" value="registrada" checked>
                                <label class="form-check-label" for="dir_registrada">
                                    A mi dirección registrada: <span class="text-danger fw-bold">{{ $direccionUsuario }}</span>
                                </label>
                            </div>
                            @endif

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="opcion_direccion" id="dir_otra" value="otra" {{ !$direccionUsuario ? 'checked' : '' }}>
                                <label class="form-check-label" for="dir_otra">
                                    {{ $direccionUsuario ? 'Ingresar otra dirección' : 'Ingresar nueva dirección de entrega' }}
                                </label>
                            </div>
                        </div>

                        {{-- Input para escribir la dirección --}}
                        <div id="bloque_input_direccion" class="mb-3 {{ $direccionUsuario ? 'd-none' : '' }}">
                            <label for="lugar_de_entrega" class="form-label fw-bold text-danger">Escribe la dirección exacta:</label>
                            <input type="text" class="form-control border-danger" id="lugar_de_entrega" name="lugar_de_entrega" placeholder="Ej: Junín 1234, Piso 2 Depto B" value="{{ old('lugar_de_entrega', $direccionUsuario ?? '') }}" required>
                        </div>
                    </div>
                </div>

                {{-- BLOQUE: RETIRO POR LOCAL (Oculto por defecto) --}}
                <div id="bloque_retiro" class="card text-dark bg-light mb-4 d-none">
                    <div class="card-body">
                        <h5 class="card-title text-success"><i class="bi bi-geo-alt"></i> Información de Retiro</h5>
                        <p class="card-text">Podés pasar a buscar tu pedido por nuestra sucursal central.</p>
                        <p class="mb-0"><strong>Dirección:</strong> Calle Junín 2145, Corrientes Capital.</p>
                    </div>
                </div>

                <div class="row justify-content-center bg-dark mt-4">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectMetodo = document.getElementById('metodo_entrega');
        const bloqueEnvio = document.getElementById('bloque_envio');
        const bloqueRetiro = document.getElementById('bloque_retiro');

        const radioRegistrada = document.getElementById('dir_registrada');
        const radioOtra = document.getElementById('dir_otra');
        const bloqueInputDireccion = document.getElementById('bloque_input_direccion');
        const inputLugarEntrega = document.getElementById('lugar_de_entrega');
        const formConfirmarPedido = document.getElementById('form-confirmar-pedido');

        const direccionUsuario = formConfirmarPedido ? formConfirmarPedido.dataset.direccionUsuario || '' : '';

        // Lógica al elegir en el menú desplegable (Select)
        selectMetodo.addEventListener('change', function() {
            if (this.value === 'envio') {
                bloqueEnvio.classList.remove('d-none');
                bloqueRetiro.classList.add('d-none');

                // Verificamos si tiene la opción registrada marcada
                if (radioRegistrada && radioRegistrada.checked) {
                    inputLugarEntrega.value = direccionUsuario;
                    inputLugarEntrega.removeAttribute('required');
                } else {
                    inputLugarEntrega.value = '';
                    inputLugarEntrega.setAttribute('required', 'required');
                }
            } else if (this.value === 'retiro') {
                bloqueRetiro.classList.remove('d-none');
                bloqueEnvio.classList.add('d-none');

                inputLugarEntrega.value = 'Retiro en Local';
                inputLugarEntrega.removeAttribute('required');
            }
        });

        // Eventos de los Radio Buttons
        if (radioRegistrada) {
            radioRegistrada.addEventListener('change', function() {
                if (this.checked) {
                    bloqueInputDireccion.classList.add('d-none');
                    inputLugarEntrega.value = direccionUsuario;
                    inputLugarEntrega.removeAttribute('required');
                }
            });
        }

        if (radioOtra) {
            radioOtra.addEventListener('change', function() {
                if (this.checked) {
                    bloqueInputDireccion.classList.remove('d-none');
                    inputLugarEntrega.value = '';
                    inputLugarEntrega.setAttribute('required', 'required');
                    inputLugarEntrega.focus();
                }
            });
        }
    });
</script>
@endsection