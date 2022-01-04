<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("sigla", 10);
            $table->integer("semestre")->nullable();
            $table->bigInteger("materia_id")->unsigned()->nullable();
            $table->text("descripcion")->nullable();
            // N Materias : 1 Carrera
            $table->bigInteger("carrera_id")->unsigned();
            $table->foreign("carrera_id")->references("id")
                                            ->on("carreras")
                                            ->onDelete('cascade');
            $table->foreign("materia_id")->references("id")
                                            ->on("materias");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
