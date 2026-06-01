@extends('layouts.app')
@section('title', 'Proteínas - Al Fallo Store')
@section('content')


<div class="container-fluid text-center text-light mt-5">
<h1 class="welcome-container text-center mt-5 mb-4 fs-0">Proteínas</h1>
<div class="row mb-3 gy-md-4 gx-md-0">


        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-2lb-chocolate-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$44.99</h5>
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
                    <h5 class="card-title fw-bold">$44.99</h5>
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
                    <h5 class="card-title fw-bold">$44.99</h5>
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
                    <h5 class="card-title fw-bold">$44.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 2lb - Sabor Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/WP-2Lb-Vainilla.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Whey protein 2lb doypack Vanilla ice cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/WP-2Lb-Chocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Whey protein 2lb doypack Chocolate Suizo</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/WP-2Lb-Cookies.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Whey protein 2lb doypack Cookies & Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/WP-2Lb-Strawberry.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Whey protein 2lb doypack Strawberry Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/WP-2Lb-Banana.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Whey protein 2lb doypack Banana Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/JustPlantProteinNEWSF.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star Nutrition Just Plant Protein 2lb</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/doypack-vegetal-protein-isolate-gold-nutrition-vegan-vegetariano-proteina-plantas-sabor-manzana.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Vegetal Protein Isolate Vegan - Sabor Manzana</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/MotherProteinVanilla-WebsiteRendercopy.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Mother Protein - Sabor Vanilla Ice Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-coco-vegetal-gold.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Vegetal Protein - Sabor Coco</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-neutro-vegetal-gold.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$49.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Vegetal Protein - Sabor Neutro</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-2Lb-Vainilla.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 2lb Vanilla ice cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-2Lb-Chocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 2lb Chocolate Suizo</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-2Lb-Cookies.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 2lb Cookies & Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-2Lb-Strawberry.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 2lb Strawberry Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-2Lb-Banana.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 2lb Banana cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/CollagenWheyProteinVanilla.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star Nutrition Collagen Whey Protein 2lb Vainilla cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/CollagenWheyProteinChocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star Nutrition Collagen Whey Protein 2lb Chocolate Suizo</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/JustWheyNEWSF.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star Nutrition Just Whey Protein Sin Sabor 2Lb</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_muescle_mass_gainer_gold_nutrition_gourmet_vainilla.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$54.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Muscle Mass Gainer - Gourmet Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PNW-Chocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$59.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star Nutrition Nitro Whey Protein 2lb Chocolate Suizo</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/insane-100_-Whey-Chocolate-Front.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$59.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Insane Labz 100% Whey Protein - Sabor Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/Insane-Whey-Birthday-Cake-Front.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$59.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Insane Labz Insane Whey - Sabor Birthday Cake</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/Insane-ISO-Chocolate-Front.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$64.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Insane Labz Insane ISO Isolate - Sabor Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/InsaneWheyRIPPEDVanilla-FRONT-650x650_1.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$64.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Insane Labz Insane Whey Ripped - Sabor Vanilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_whey_ripped_protein_gold_nutrition_gourmet_chocolate_suplemento_nutricional_deportivo.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$64.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Whey Ripped Protein - Gourmet Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_whey_ripped_protein_gold_nutrition_gourmet_vainilla_suplemento_nutricional_deportivo.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$64.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition Whey Ripped Protein - Gourmet Vainilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor_iso_gold_protein_gold_nutrition_gourmet_milk_chocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$69.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition ISO Gold Protein - Gourmet Milk Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-3Kg-Cookies.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$79.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 3kg Cookies & Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-3Kg-Banana.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$79.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 3kg Banana cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-3Kg-Chocolate.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$79.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 3kg Chocolate Suizo</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-3Kg-Vainilla.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$79.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 3kg Vainilla Ice Cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/PWP-3Kg-Strawberry.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$79.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Star nutrition Platinum Whey protein 3kg Strawberry cream</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-end">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-5lb-2lb-chocolate-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$84.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 5lb - Sabor Chocolate</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-center">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-5lb-2lb-frutilla-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$84.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 5lb - Sabor Frutilla</p>
                        <a href="/Pagina_en_construccion" class="btn btn-dark">Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 d-flex justify-content-sm-center justify-content-md-start">
            <div class="card mb-3 mt-3 h-100" style="width: 18rem;">
                <img src="{{ asset('imagenes/productos/Proteinas/sabor-100-whey-protein-5lb-2lb-vainilla-gold-nutrition.jpg') }}" class="card-img-top producto" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">$84.99</h5>
                    <div class="mt-auto">
                        <p class="card-text text-black mb-2">Gold Nutrition 100% Whey Protein 5lb - Sabor Vainilla</p>
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