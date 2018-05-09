<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNuestraEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuestra_empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_es',600);
            $table->string('titulo_en',600);
            $table->string('titulo_pt',600);

            $table->string('contenido_es',2000);
            $table->string('contenido_en',2000);
            $table->string('contenido_pt',2000);

            $table->string('imagen',300);
            $table->string('imagen_cabecera',300);
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
