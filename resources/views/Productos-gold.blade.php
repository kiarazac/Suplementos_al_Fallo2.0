@extends('layouts.app')

@section('title', 'Productos Gold Nutrition - Suplementos al fallo')

@section('content')

    <!--Contenido de la pagina-->
    <main class="flex-grow-1">



        <div class="container-fluid text-center text-light mt-5">
            <div class="row mb-3 gy-md-4 gx-md-0">



               <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-2lb-chocolate-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$62.536</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 2lb - Sabor Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-2lb-frutilla-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$62.536</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 2lb - Sabor Frutilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-2lb-unflavored-gold-nutrition-sin-sabor.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$62.536</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 2lb - Unflavored (Sin Sabor)</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-2lb-vainilla-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$62.536</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 2lb - Sabor Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/doypack-vegetal-protein-isolate-gold-nutrition-vegan-vegetariano-proteina-plantas-sabor-manzana.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$69.486</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Vegetal Protein Isolate Vegan - Sabor Manzana</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-coco-vegetal-gold.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$69.486</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Vegetal Protein - Sabor Coco</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-neutro-vegetal-gold.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$69.486</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Vegetal Protein - Sabor Neutro</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_muescle_mass_gainer_gold_nutrition_gourmet_vainilla.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$76.436</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Muscle Mass Gainer - Gourmet Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_whey_ripped_protein_gold_nutrition_gourmet_chocolate_suplemento_nutricional_deportivo.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$90.336</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Whey Ripped Protein - Gourmet Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_whey_ripped_protein_gold_nutrition_gourmet_vainilla_suplemento_nutricional_deportivo.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$90.336</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Whey Ripped Protein - Gourmet Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_iso_gold_protein_gold_nutrition_gourmet_milk_chocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$97.286</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition ISO Gold Protein - Gourmet Milk Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-5lb-2lb-chocolate-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$118.136</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 5lb - Sabor Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-5lb-2lb-frutilla-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$118.136</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 5lb - Sabor Frutilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-5lb-2lb-vainilla-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$118.136</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 5lb - Sabor Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Creatinas/creatina_monohidrato_gold_nutrition_doypack-300.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$29.176</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Creatina 300</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Pre-entreno/pre-work_gold_nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-black">$38.906</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Pre-Work (20 servs)</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>


            </div>
    </main>

@endsection