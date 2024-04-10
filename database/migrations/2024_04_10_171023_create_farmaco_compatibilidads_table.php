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
        Schema::create('farmaco_compatibilidads', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('first_farmaco');
            $table->unsignedBigInteger('second_farmaco');
            $table->unsignedBigInteger('id_compatibilidad');
            $table->timestamps();


            $table->foreign('first_farmaco')
                        ->references('id')->on('farmacos');


            $table->foreign('second_farmaco')
                        ->references('id')->on('farmacos');

            $table->foreign('id_compatibilidad')
                        ->references('id')->on('compatibilidads');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmaco_compatibilidads');
    }
};
