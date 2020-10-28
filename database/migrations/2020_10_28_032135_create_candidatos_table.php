<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {

            $table->foreignId('candidato')->constrained('pessoas','idpessoa')->onDelete('cascade');
		    $table->foreignId('chapa')->constrained('chapas','idchapa')->onDelete('cascade');
		    $table->string('posicao',45);
		    $table->primary(['candidato','chapa']);
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
        Schema::dropIfExists('candidatos');
    }
}
