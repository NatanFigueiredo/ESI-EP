<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapas', function (Blueprint $table) {
            $table->id('idchapa');
            $table->foreignId('eleicao')->constrained('eleicaos','ideleicao')->onDelete('cascade');
            $table->string('nome',50);
            $table->string('cargo',100);
            $table->integer('votos',)->default('0');
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
        Schema::dropIfExists('chapas');
    }
}
