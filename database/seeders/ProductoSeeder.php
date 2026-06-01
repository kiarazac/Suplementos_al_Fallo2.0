<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create(['nombre' => 'Star Nutrition', 'precio' => '19.99', 'categoria_id' => 1, 'marca_id' => 1, 'descripcion' => 'Proteina de la mas alta calidad', 'stock' => 100, 'imagen' => 'Creatine_300-star.jpg', 'activo' => true]);
        Producto::create(['nombre' => 'Insane Labs', 'precio' => '59.99', 'categoria_id' => 3, 'marca_id' => 2, 'descripcion' => 'Preentreno de alta calidad', 'stock' => 50, 'imagen' => 'Psychotic-Black-Fruit-Punch-Front.jpg', 'activo' => true]);
        Producto::create(['nombre' => 'Gold Nutrition', 'precio' => '39.99', 'categoria_id' => 2, 'marca_id' => 3, 'descripcion' => 'Creatina de alta calidad', 'stock' => 75, 'imagen' => '/imagenes/productos/Creatinas/creatina_monohidrato_gold_nutrition_doypack-300.jpg', 'activo' => true]);
    }

    
}
