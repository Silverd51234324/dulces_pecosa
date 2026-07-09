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
    Schema::create('finances', function (Blueprint $table) {

        $table->id();


        $table->date('date');


        // Inversión realizada
        $table->decimal(
            'investment',
            10,
            2
        );


        // Ajuste manual de dinero recuperado
        $table->decimal(
            'manual_recovery',
            10,
            2
        )
        ->default(0);



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
        Schema::dropIfExists('finances');
    }
};
