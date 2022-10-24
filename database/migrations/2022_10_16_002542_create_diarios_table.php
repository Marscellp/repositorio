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
        Schema::create('diarios', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('hora');
            $table->text('resumen')->nullable();
            $table->text('procedimiento')->nullable();
            $table->text('observacion')->nullable();
            //
            $table->unsignedBigInteger('linea_investigacions_id');
            $table->foreign('linea_investigacions_id')->references('id')->on('linea_investigacions'); 
            //
            $table->unsignedBigInteger('personals_id');
            $table->foreign('personals_id')->references('id')->on('personals'); 
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
        Schema::dropIfExists('diarios');
    }
};
