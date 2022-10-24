<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_inicio');
            $table->string('fecha_final');
            $table->string('firma')->nullable();
            $table->string('horario')->nullable();
            //
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
            //
            $table->unsignedBigInteger('linea_investigacions_id');
            $table->foreign('linea_investigacions_id')->references('id')->on('linea_investigacions'); 
            //
            $table->unsignedBigInteger('laboratorios_id');
            $table->foreign('laboratorios_id')->references('id')->on('laboratorios'); 
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
};
