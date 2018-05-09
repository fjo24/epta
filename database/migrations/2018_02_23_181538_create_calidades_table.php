<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calidades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('imagen',400);
            $table->string('contenido_es',1000);
            $table->string('contenido_en',1000);
            $table->string('contenido_pt',1000);

            $table->string('titulo_es',1000);
            $table->string('titulo_en',1000);
            $table->string('titulo_pt',1000);

            $table->string('icono1',400);
            $table->string('icono2',400);

            $table->string('ficha_es',400);
            $table->string('ficha_en',400);
            $table->string('ficha_pt',400);
            $table->string('nombre_es',100);
            $table->string('nombre_en',100);
            $table->string('nombre_pt',100);

            $table->string('orden',10);
                  
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
        //
    }
}
