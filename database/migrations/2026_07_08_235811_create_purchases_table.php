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
    Schema::create('purchases', function (Blueprint $table) {

        $table->id();

        // Fecha de compra
        $table->date('purchase_date');

        // Total invertido
        $table->decimal('total',10,2)
              ->default(0);

        // Nota opcional
        $table->text('notes')
              ->nullable();


        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
