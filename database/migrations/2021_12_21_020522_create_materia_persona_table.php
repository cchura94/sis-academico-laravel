<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_persona', function (Blueprint $table) {
            $table->id();
            // N:M
            $table->bigInteger("materia_id")->unsigned();
            $table->bigInteger("persona_id")->unsigned();
            $table->bigInteger("periodo_id")->unsigned();

            $table->string("rol", 20)->default("estudiante");
            $table->integer("nota")->nullable();

            $table->foreign("materia_id")->references("id")->on("materias");
            $table->foreign("persona_id")->references("id")->on("personas");
            $table->foreign("periodo_id")->references("id")->on("periodos");
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
        Schema::dropIfExists('materia_persona');
    }
}
