<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {

            $table->foreignId('idpessoa')->constrained('pessoas','idpessoa')->onDelete('cascade');
            $table->string('login',45);
            $table->string('senha',100);
            $table->integer('status',)->default('1');
            $table->date('lastLogin');
            $table->integer('level',)->default('1');
            $table->timestamps();

            $table->primary('idpessoa');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logins');
    }
}
