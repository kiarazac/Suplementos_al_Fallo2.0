<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ public function run(): void
{
    Producto::create([
        'nombre' => 'Star Nutrition creatina', 
        'precio' => '19.99', 
        'categoria_id' => 2, 
        'marca_id' => 1, 
        'descripcion' => 'Creatina de la mas alta calidad', 
        'stock' => 100, 
        'imagen' => 'Creatinas/Creatine_300-star.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);

    Producto::create([
        'nombre' => 'Insane Labs creatina', 
        'precio' => '59.99', 
        'categoria_id' => 2, 
        'marca_id' => 2, 
        'descripcion' => 'Creatina de alta calidad', 
        'stock' => 50, 
        'imagen' => 'Creatinas/Creatine-300-Serving-Front.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);

    Producto::create([
        'nombre' => 'Gold Nutrition creatina', 
        'precio' => '39.99', 
        'categoria_id' => 2, 
        'marca_id' => 3, 
        'descripcion' => 'Creatina de alta calidad', 
        'stock' => 75, 
        'imagen' => 'Creatinas/creatina_monohidrato_gold_nutrition_doypack-300.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);


Producto::create([
        'nombre' => 'Star Nutrition proteina', 
        'precio' => '39.99', 
        'categoria_id' => 1, 
        'marca_id' => 1, 
        'descripcion' => 'Proteina de alta calidad', 
        'stock' => 75, 
        'imagen' => 'Proteinas/WP-2Lb-Chocolate.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);



Producto::create([
        'nombre' => 'insane labs proteina', 
        'precio' => '39.99', 
        'categoria_id' => 1, 
        'marca_id' => 2, 
        'descripcion' => 'Proteina de alta calidad', 
        'stock' => 75, 
        'imagen' => 'Proteinas/Insane-ISO-Chocolate-Front.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);
Producto::create([
        'nombre' => 'Gold Nutrition proteina', 
        'precio' => '39.99', 
        'categoria_id' => 1, 
        'marca_id' => 3, 
        'descripcion' => 'Proteina de alta calidad', 
        'stock' => 75, 
        'imagen' => 'Proteinas/sabor_iso_gold_protein_gold_nutrition_gourmet_milk_chocolate.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);

    Producto::create([
        'nombre' => 'Star Nutrition preentreno', 
        'precio' => '59.99', 
        'categoria_id' => 3, 
        'marca_id' => 1, 
        'descripcion' => 'Preentreno de alta calidad', 
        'stock' => 50, 
        'imagen' => 'Pre-entreno/PumpV8-ACAI_star.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);

    Producto::create([
        'nombre' => 'Gold Nutrition preentreno', 
        'precio' => '59.99', 
        'categoria_id' => 3, 
        'marca_id' => 2, 
        'descripcion' => 'Preentreno de alta calidad', 
        'stock' => 50, 
        'imagen' => 'Pre-entreno/pre-work_gold_nutrition.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);

    Producto::create([
        'nombre' => 'Insane Labs preentreno', 
        'precio' => '59.99', 
        'categoria_id' => 3, 
        'marca_id' => 3, 
        'descripcion' => 'Preentreno de alta calidad', 
        'stock' => 50, 
        'imagen' => 'Pre-entreno/Psychotic-Black-Fruit-Punch-Front.jpg', // <-- Agregada la subcarpeta
        'activo' => true
    ]);

}



}
