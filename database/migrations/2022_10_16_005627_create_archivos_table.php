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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->text('marco')->nullable();
            $table->text('resultado')->nullable();
            $table->text('matriz')->nullable();
            $table->text('actividad')->nullable();
            $table->text('plan')->nullable();
            $table->text('presupuesto')->nullable();
            $table->text('bien')->nullable();
            $table->text('procedimiento')->nullable();
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
        Schema::dropIfExists('archivos');
    }
};
