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
    Schema::table('finances', function (Blueprint $table) {

        $table->decimal('manual_recovery',10,2)
              ->default(0)
              ->after('investment');

    });
}


public function down(): void
{
    Schema::table('finances', function (Blueprint $table) {

        $table->dropColumn('manual_recovery');

    });
}
};
