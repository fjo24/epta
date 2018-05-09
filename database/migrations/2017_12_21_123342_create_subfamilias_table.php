<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubfamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subfamilias', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre_es',60);
            $table->string('nombre_en',60);
            $table->string('nombre_pt',60);

            $table->string('id_familia');

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
