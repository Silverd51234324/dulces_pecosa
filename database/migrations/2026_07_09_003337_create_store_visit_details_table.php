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
    Schema::create('store_visit_details', function (Blueprint $table) {

        $table->id();


        $table->foreignId('store_visit_id')
              ->constrained()
              ->cascadeOnDelete();


        $table->foreignId('product_id')
              ->constrained()
              ->cascadeOnDelete();



        // Lo que dejamos
        $table->decimal('supplied_quantity',10,2);



        // Lo que encontramos al regresar
        $table->decimal('remaining_quantity',10,2);



        // Vendido = suministrado - restante
        $table->decimal('sold_quantity',10,2);



        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_visit_details');
    }
};
