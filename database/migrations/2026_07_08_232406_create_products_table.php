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
    Schema::create('products', function (Blueprint $table) {

        $table->id();

        $table->string('name');

        // packaged = bolsa preparada
        // unit = venta por pieza
        $table->string('type')->default('packaged');

        // Ejemplo:
        // 1 kg
        // 500 g
        // 50 piezas
        $table->decimal('purchase_amount', 10, 2);

        $table->string('purchase_unit');

        // Referencia de cuántas bolsas salen aproximadamente
        $table->decimal('production_yield', 10, 2);

        // Precio al que vendes cada bolsa/pieza
        $table->decimal('sale_price', 10, 2);

        // Para avisarte cuando quede poco producto
        $table->integer('minimum_stock')->default(0);

        // Orden de aparición
        $table->integer('display_order')->default(0);

        // Imagen opcional
        $table->string('image')->nullable();

        $table->boolean('active')->default(true);

        $table->timestamps();
    });
}

};