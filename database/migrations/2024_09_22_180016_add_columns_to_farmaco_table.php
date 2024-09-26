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
        Schema::table('farmacos', function (Blueprint $table) {
            $table->string('nombre_comercial')->nullable();
            $table->string('accion_teraupetica')->nullable();
            $table->string('via_administracion')->nullable();
            $table->string('dosis')->nullable();
            $table->string('efectos')->nullable();
            $table->string('concentracion_max')->nullable();
            $table->string('concentracion_recomendada')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('farmaco', function (Blueprint $table) {
            //
        });
    }
};
