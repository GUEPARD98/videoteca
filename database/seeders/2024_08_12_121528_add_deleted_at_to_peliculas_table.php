<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPeliculasTable extends Migration
{
    public function up()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Verifica si la columna no existe antes de agregarla

                $table->timestamp('deleted_at')->nullable()->after('video_url');
        });
    }

    public function down()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Verifica si la columna existe antes de eliminarla
            if (Schema::hasColumn('peliculas', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
        });
    }
}
