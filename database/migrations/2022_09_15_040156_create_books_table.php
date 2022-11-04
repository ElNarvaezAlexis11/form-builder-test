<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/**
 * @author Narvaez Ruiz Alexis 
 * Migración para generar la tabla de "books" (libros)
 *
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     * @param id Llave primaria de la tabla
     * @param title Titulo del libro.
     * @param release Fecha de lanzamiento/publicación del libro
     * @param resume Resumen corto del libro 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->date('release');
            $table->text('resume')->nullable(false);
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
        Schema::dropIfExists('books');
    }
};
