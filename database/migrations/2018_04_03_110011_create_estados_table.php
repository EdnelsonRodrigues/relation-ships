<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            //relacionar um pais para muitos estados
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')
                        ->references('id')
                        ->on('paises')
                        ->onDelete('cascade');
            $table->string('nome', 100);
            $table->string('sigla', 10);
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
        Schema::dropIfExists('estados');
    }
}
