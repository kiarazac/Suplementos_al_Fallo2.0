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

                        <div class="mb-3">
                            <label for="direccion" class="form-label fw-bold">Dirección de Entrega (Calle, Número, Piso/Depto):</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej: Junín 1234, Piso 2 Depto B">
                        </div>

                        <div class="mb-3">
                            <label for="referencias" class="form-label">Referencias (Opcional):</label>
                            <textarea class="form-control" id="referencias" name="referencias" rows="2" placeholder="Ej: Entre Mendoza y Córdoba, portón negro..."></textarea>
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
                <div class="row justify-content-center">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-warning btn-lg fw-bold">
                                Confirmar y Registrar Pedido <i class="bi bi-check-circle"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="row mt-3">
                        <a href="{{ route('carrito.index') }}" class="btn btn-outline-secondary text-light">Volver al Carrito</a>
                    </div>
                </div>




            </form>
        </div>
    </div>
</div>

{{-- LÓGICA JAVASCRIPT PARA MOSTRAR/OCULTAR SECCIONES --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectMetodo = document.getElementById('metodo_entrega');
        const bloqueEnvio = document.getElementById('bloque_envio');
        const bloqueRetiro = document.getElementById('bloque_retiro');
        const inputDireccion = document.getElementById('direccion');

        selectMetodo.addEventListener('change', function() {
            if (this.value === 'envio') {
                // Mostrar envío, ocultar retiro
                bloqueEnvio.classList.remove('d-none');
                bloqueRetiro.classList.add('d-none');

                // Hacer obligatorio el campo de dirección si es envío
                inputDireccion.setAttribute('required', 'required');
            } else if (this.value === 'retiro') {
                // Mostrar retiro, ocultar envío
                bloqueRetiro.classList.remove('d-none');
                bloqueEnvio.classList.add('d-none');

                // Quitar la obligatoriedad y limpiar el campo de dirección
                inputDireccion.removeAttribute('required');
                inputDireccion.value = '';
            } else {
                // Por si vuelve a la opción vacía
                bloqueEnvio.classList.add('d-none');
                bloqueRetiro.classList.add('d-none');
                inputDireccion.removeAttribute('required');
            }
        });
    });
</script>
@endsection