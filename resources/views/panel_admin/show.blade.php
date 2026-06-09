@extends('layouts.app')

@section('title', 'Detalle de Producto - Suplementos al fallo')

@section('content')
    <div class="container py-5">

        {{-- BOTÓN PARA VOLVER ATRÁS --}}
        <div class="row mb-4">
            <div class="col-12 text-center text-md-start">
                <a href="{{ route('panel_admin.index') }}" class="btn btn-outline-warning fw-bold">
                    <i class="bi bi-arrow-left"></i> Volver al Panel
                </a>
            </div>
        </div>

        {{-- TARJETA DEL PRODUCTO CENTRADA --}}
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 col-lg-4 d-flex justify-content-center">

                <div class="card mb-3 h-100 shadow-lg" style="width: 18rem;">

                    {{-- IMAGEN --}}
                    <img src="{{ asset('imagenes/productos/' . $producto->imagen) }}" class="card-img-top producto"
                        alt="{{ $producto->nombre }}">

                    <div class="card-body d-flex flex-column">

                        {{-- PRECIO --}}
                        <h5 class="card-title fw-bold text-black text-center fs-4">
                            ${{ $producto->precio }}
                        </h5>

                        <div class="mt-auto text-center">
                            {{-- NOMBRE --}}
                            <p class="card-text text-black mb-2 fs-5">
                                {{ $producto->nombre }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection