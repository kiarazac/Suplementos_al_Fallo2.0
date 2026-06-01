@extends('layouts.app')
@section('title', 'Pre-entrenos - Al Fallo Store')
@section('content')
    <!--Contenido de la pagina-->
    <main class="flex-grow-1">

        <h1 class=" welcome-container text-center mt-5 mb-4 fs-0">Pre-entrenos</h1>

        <div class="container-fluid text-center text-light mt-5">
            <div class="row mb-3 gy-md-4 gx-md-0">


                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/PumpV8-ACAI_star.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$27.000</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Star Nutrition Pump V8 (30 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/pre-work_gold_nutrition.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$30.000</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Gold Nutrition Pre-Work (20 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Pump3dRipped-limon_star.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$31.990</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Star Nutrition Pump 3D Ripped - Sabor Limón (45 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Fruit-Punch-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$34.990</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic - Sabor Fruit Punch (35 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Black-Fruit-Punch-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$37.990</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic Black - Sabor Fruit Punch (35 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Gold-Blue-Punch-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$39.990</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic Gold - Sabor Blue Punch (35 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Xtreme-Fruit-Punch-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$42.99</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic Xtreme - Sabor Fruit Punch (35 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-X-Candied-Watermelon-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$45.990</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic X - Sabor Candied Watermelon (40 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-SAW-Blood-Orange-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$49.999</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic SAW - Sabor Blood Orange (35 servs)</p>
                                <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
@endsection
