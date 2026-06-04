<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLugarDeEntregaToPedidosTable extends Migration
{
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            // Agregamos la columna. Le ponemos nullable() por si en algún momento un pedido se crea sin este dato al principio.
            $table->string('lugar_de_entrega')->nullable()->after('estado');
        });
    }

    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            // Esto elimina la columna si en el futuro decides revertir la migración
            $table->dropColumn('lugar_de_entrega');
        });
    }
}