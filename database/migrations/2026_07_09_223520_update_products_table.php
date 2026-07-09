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
        Schema::table('products', function (Blueprint $table) {

            // Ya no lo captura el usuario, pero lo seguiremos usando
            // para guardar el cálculo automático.
            $table->decimal('production_yield', 10, 2)->change();

            // Precio total de la compra
            $table->decimal('purchase_price', 10, 2)
                ->after('purchase_unit');

            // Cantidad que lleva cada unidad
            $table->decimal('unit_quantity', 10, 2)
                ->after('purchase_price');

            // Unidad de esa cantidad (g, kg, pieza...)
            $table->string('unit_unit')
                ->after('unit_quantity');

            // Calculado automáticamente
            $table->decimal('unit_cost', 10, 2)
                ->default(0)
                ->after('production_yield');

            // Calculado automáticamente
            $table->decimal('profit', 10, 2)
                ->default(0)
                ->after('sale_price');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'purchase_price',
                'unit_quantity',
                'unit_unit',
                'unit_cost',
                'profit'
            ]);

        });
    }
};