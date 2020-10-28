<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('idpessoa');
            $table->string('nomecivil',100);
            $table->string('nomesocial',100)->nullable();
            $table->string('rg',9);
            $table->string('cpf',11);
            $table->string('funcao',50);
            $table->date('data_nasc');
            $table->string('email',100);
            $table->string('celular',20);
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
        Schema::dropIfExists('pessoas');
    }
}
