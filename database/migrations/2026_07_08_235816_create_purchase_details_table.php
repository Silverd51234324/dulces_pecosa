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
    Schema::create('purchase_details', function (Blueprint $table) {

        $table->id();


        $table->foreignId('purchase_id')
              ->constrained()
              ->cascadeOnDelete();


        $table->foreignId('product_id')
              ->constrained()
              ->cascadeOnDelete();


        // Cantidad comprada
        // Ejemplo:
        // 1 kg
        // 500 gramos
        $table->decimal('quantity',10,2);


        // kg, g, piezas
        $table->string('unit');


        // Precio pagado
        $table->decimal('unit_price',10,2);


        // Resultado cantidad x precio
        $table->decimal('subtotal',10,2);


        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};
