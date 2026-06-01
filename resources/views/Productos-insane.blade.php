@extends('layouts.app')

@section('title', 'Productos Insane Labz - Suplementos al fallo')

@section('content')

    <!--Contenido de la pagina-->
    <main class="flex-grow-1">



        <div class="container-fluid text-center text-light mt-5">
            <div class="row mb-3 gy-md-4 gx-md-0">

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Proteinas/MotherProteinVanilla-WebsiteRendercopy.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$69.486</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Mother Protein - Sabor Vanilla Ice Cream</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Proteinas/insane-100_-Whey-Chocolate-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$83.386</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz 100% Whey Protein - Sabor Chocolate</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Proteinas/Insane-Whey-Birthday-Cake-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$83.386</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Insane Whey - Sabor Birthday Cake</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Proteinas/Insane-ISO-Chocolate-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$90.336</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Insane ISO Isolate - Sabor Chocolate</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Proteinas/InsaneWheyRIPPEDVanilla-FRONT-650x650_1.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$90.336</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Insane Whey Ripped - Sabor Vanilla</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Creatinas/Crea-SinSabor-300.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$20.836</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Creatina 300</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Creatinas/Creatine-300-Serving-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$31.956</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Creatina 300</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Creatinas/Creatine-Craig-Fruit-Punch-Front-294.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$34.736</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Creatina 294</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Fruit-Punch-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$48.636</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic - Sabor Fruit Punch (35 servs)</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Black-Fruit-Punch-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$52.806</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic Black - Sabor Fruit Punch (35 servs)</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Gold-Blue-Punch-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$55.586</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic Gold - Sabor Blue Punch (35 servs)</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-Xtreme-Fruit-Punch-Front.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$59.756</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic Xtreme - Sabor Fruit Punch (35 servs)</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-X-Candied-Watermelon-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$63.926</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic X - Sabor Candied Watermelon (40 servs)</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
                    <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                        <img src="{{ asset('imagenes/productos/Pre-entreno/Psychotic-SAW-Blood-Orange-Front-insane.jpg') }}" class="card-img-top producto" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-black">$69.486</h5>
                            <div class="mt-auto">
                                <p class="card-text text-black mb-2">Insane Labz Psychotic SAW - Sabor Blood Orange (35 servs)</p>
                                <a href="#" class="btn btn-dark">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
    </main>

@endsection