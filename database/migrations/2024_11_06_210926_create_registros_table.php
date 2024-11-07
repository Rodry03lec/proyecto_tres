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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->dateTime("fecha_hora");
            $table->date('fecha');
            $table->time('hora');
            $table->text('codigo_unico');
            $table->string('destino');
            $table->string('descripcion');
            $table->unsignedBigInteger('puesto_id');
            $table->unsignedBigInteger('tarifa_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('vehiculo_id');
            $table->timestamps();


            $table->foreign('puesto_id')->references('id')->on('puestos')->onDelete('restrict');
            $table->foreign('tarifa_id')->references('id')->on('tarifas')->onDelete('restrict');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};