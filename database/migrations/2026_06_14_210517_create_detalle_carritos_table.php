<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('detalle_carritos', function (Blueprint $table) {
        $table->id();

        // foreignId() asegura que el tipo de dato coincida perfectamente
        // constrained() le dice a qué tabla conectarse automáticamente
        $table->foreignId('carrito_id')->constrained('carritos')->onDelete('cascade');
        
        // Aplica la misma regla para la relación con productos para evitar el mismo error
        $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

        $table->integer('cantidad');
        $table->decimal('precio', 10, 2);
        $table->decimal('subtotal', 10, 2);
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_carritos');
    }
};
