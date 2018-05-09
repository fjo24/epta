<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_subfamilias');

            $table->string('tabla',1000);

            $table->string('contenido_es',2000);
            $table->string('contenido_en',2000);
            $table->string('contenido_pt',2000);

            $table->string('imagen_destacada',400);
            
            $table->string('descarga_es',400);
            $table->string('descarga_en',400);
            $table->string('descarga_pt',400);
            $table->string('codigo1',50);

            $table->string('solucion_es',400);
            $table->string('solucion_en',400);
            $table->string('solucion_pt',400);
            $table->string('codigo2',50);

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
