<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descargas', function (Blueprint $table) {
            $table->increments('id');

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
