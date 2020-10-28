<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleicaos', function (Blueprint $table) {

            $table->id('ideleicao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('titulo',45);
            $table->integer('flag_status',)->default('1');
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
        Schema::dropIfExists('eleicaos');
    }
}
