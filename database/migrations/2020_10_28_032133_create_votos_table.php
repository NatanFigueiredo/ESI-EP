<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function (Blueprint $table) {
            $table->foreignId('pessoa')->constrained('pessoas','idpessoa')->onDelete('cascade');
            $table->foreignId('eleicao')->constrained('eleicaos','ideleicao')->onDelete('cascade');
            $table->date('data_voto');
            $table->primary(['pessoa','eleicao']);
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
        Schema::dropIfExists('votos');
    }
}
