<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanhiaCidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabela de Many To Many para servir de ponte entre as tabelas Cidade e Companhia
        Schema::create('companhia_cidade', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cidade_id')->unsigned();
            $table->integer('companhia_id')->unsigned();

            $table->foreign('cidade_id')
                    ->references('id')
                    ->on('cidades')
                    ->onDelete('cascade');
            $table->foreign('companhia_id')
                    ->references('id')
                    ->on('companhias')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companhia_cidade');
    }
}
