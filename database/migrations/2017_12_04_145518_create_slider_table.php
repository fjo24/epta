<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen',300);
            $table->string('texto_es',300)->nullable();
            $table->string('texto_en',300)->nullable();
            $table->string('texto_pt',300)->nullable();
            $table->string('orden');
            $table->enum('seccion',['home','producto']);
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
