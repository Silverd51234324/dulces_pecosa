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
    Schema::create('store_products', function (Blueprint $table) {

        $table->id();


        $table->foreignId('store_id')
              ->constrained()
              ->cascadeOnDelete();


        $table->foreignId('product_id')
              ->constrained()
              ->cascadeOnDelete();



        // Cantidad que debe tener normalmente
        $table->decimal('assigned_quantity',10,2);



        $table->timestamps();



        $table->unique([
            'store_id',
            'product_id'
        ]);

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_products');
    }
};
