<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('poster_imagen')->nullable();
            $table->string('autor')->nullable();
            $table->integer('duracion')->nullable(); // Duración en minutos
            $table->unsignedBigInteger('category_id');
            $table->date('fecha_creacion')->nullable();
            $table->string('lugar_grabacion')->nullable(); // Lugar donde se grabó o creó
            $table->string('video_url')->nullable(); // URL del video contenedor
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peliculas');
    }
}