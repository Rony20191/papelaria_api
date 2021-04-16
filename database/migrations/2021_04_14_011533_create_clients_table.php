<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome',255);
            $table->string('email',255)->unique();
            $table->string('telefone',20);
            $table->date('data_nascimento');
            $table->string('endereco',250);
            $table->string('complemento',250);
            $table->string('bairro',250);
            $table->string('cep',250);
            $table->date('data_cadastro');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
