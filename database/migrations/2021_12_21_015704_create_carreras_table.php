<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id(); // id (bigInt)
            $table->string("nombre", 200);
            $table->text("detalle")->nullable();
            $table->integer("nro_semestres")->default(0);
            $table->timestamps(); // created_at, updated_at (datetime)
            $table->softDeletes(); // delete_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
