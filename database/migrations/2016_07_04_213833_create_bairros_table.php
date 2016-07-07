<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBairrosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_bairro', function (Blueprint $table) {
            $table->increments('id_bairro');
            $table->string('bai_nome', 80);
            $table->integer('cidade_id')->unsigned();
        });

        Schema::table('tb_bairro', function (Blueprint $table) {
            $table->foreign('cidade_id')->references('id_cidade')->on('tb_cidade')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('tb_bairro');
    }
}
