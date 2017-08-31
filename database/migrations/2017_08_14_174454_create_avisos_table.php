<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avisos', function (Blueprint $table) {
            $table->increments('idAviso');
            $table->string('titleAviso');
            $table->integer('cursoAviso')->unsigned();
            $table->longText('textAviso');
            $table->timestamps();
        });
        
        Schema::table('avisos', function ($table) {
            $table->foreign('cursoAviso')->references('idCurso')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avisos');
    }
}
