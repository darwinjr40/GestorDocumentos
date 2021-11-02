<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('caratula');
            $table->string('jurisdiccion');
            $table->string('tipo');
            $table->string('objeto');
            $table->integer('cantidadFojas')->nullable();
            $table->string('year')->nullable();
            $table->string('numeroCausa')->nullable();
            $table->string('tribunal')->nullable();
            $table->string('estado')->nullable();

            $table->unsignedBigInteger('userJuezId')->nullable();
            $table->foreign('userJuezId')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('userContrarioId')->nullable();
            $table->foreign('userContrarioId')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('procesos');
    }
}
