<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogradourosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_logradouro', function (Blueprint $table) {
            $table->mediumIncrements('id_logradouro');
            $table->string('log_descricao', 100);
            $table->smallInteger('logradouro_tipo_id')->unsigned();
        });

        Schema::table('tb_logradouro', function (Blueprint $table) {
            $table->foreign('logradouro_tipo_id')->references('id_logradouro_tipo')->on('tb_logradouro_tipo')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('tb_logradouro');
    }
}
