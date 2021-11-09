<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuaciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('path')->nullable();
            $table->string('file')->nullable();
            $table->string('tipo');
            $table->string('tipoArchivo');
            $table->dateTime('fecha')->nullable();
            $table->string('importante')->nullable();
            $table->unsignedBigInteger('procesoId');
            $table->foreign('procesoId')->references('id')->on('procesos')->onDelete('cascade');
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
        Schema::dropIfExists('actuaciones');
    }
}
