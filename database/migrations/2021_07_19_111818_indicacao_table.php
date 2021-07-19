<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IndicacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',45);
            $table->string('cpf',45);
            $table->string('telefone',45);
            $table->string('email',45);
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('status_indicacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicacoes');
    }
}
