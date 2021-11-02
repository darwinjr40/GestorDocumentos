<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ci');
            $table->date('fecha_nac')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('email');
            $table->string('tipo');
            $table->string('telefono');
            $table->string('sexo');
            $table->unsignedBigInteger('procesoId');
            $table->foreign('procesoId')->references('id')->on('procesos')->onUpdate('cascade')->onDelete('cascade');
            /* $table->unsignedBigInteger('tipoParteId');
            $table->foreign('tipoParteId')->references('id')->on('tipo_partes')->onUpdate('cascade')->onDelete('cascade'); */
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
        Schema::dropIfExists('partes');
    }
}
