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
    Schema::create('productions', function (Blueprint $table) {

        $table->id();


        // Producto que estamos preparando
        $table->foreignId('product_id')
              ->constrained()
              ->cascadeOnDelete();


        /*
        Cantidad utilizada de materia prima

        Ejemplos:
        1 kg
        500 g
        50 piezas
        */

        $table->decimal('input_quantity',10,2);

        $table->string('input_unit');



        /*
        Resultado generado

        Ejemplos:
        20 bolsas
        50 piezas
        */

        $table->decimal('output_quantity',10,2);

        $table->string('output_unit');



        // Costo de lo utilizado
        $table->decimal('cost',10,2);



        // Precio de venta por unidad producida
        $table->decimal('sale_price',10,2);



        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
