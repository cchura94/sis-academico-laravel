<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_materia', function (Blueprint $table) {
            $table->id();
            $table->string("dia")->nullable();
            $table->integer("hora_inicio")->nullable();
            $table->integer("hora_fin")->nullable();
            $table->bigInteger("aula_id")->unsigned();
            $table->bigInteger("materia_id")->unsigned();
            // N:M
            $table->foreign("aula_id")->references("id")->on("aulas");
            $table->foreign("materia_id")->references("id")->on("materias");

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
        Schema::dropIfExists('aula_materia');
    }
}
