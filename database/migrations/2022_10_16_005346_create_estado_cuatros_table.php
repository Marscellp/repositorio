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
        Schema::create('estado_cuatros', function (Blueprint $table) {
            $table->id();
            $table->text('beneficiario_directo')->nullable();
            $table->text('beneficiario_indirecto')->nullable();
            //
            $table->unsignedBigInteger('completos_id');
            $table->foreign('completos_id')->references('id')->on('completos'); 
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
        Schema::dropIfExists('estado_cuatros');
    }
};
