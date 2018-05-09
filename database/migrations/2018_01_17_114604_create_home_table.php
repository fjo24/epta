<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo_es',500);
            $table->string('titulo_en',500);
            $table->string('titulo_pt',500);

            $table->string('subtitulo_en',500);
            $table->string('subtitulo_es',500);
            $table->string('subtitulo_pt',500);

            $table->string('contenido_es',4000);
            $table->string('contenido_en',4000);
            $table->string('contenido_pt',4000);

            $table->string('link',400);
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
