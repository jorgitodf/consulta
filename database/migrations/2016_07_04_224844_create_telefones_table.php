<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
    public function up()
    {
        Schema::create('tb_telefone', function (Blueprint $table) {
            $table->increments('id_telefone');
            $table->string('num_telefone_celular', 12)->nullable();
            $table->string('num_telefone_residencial', 12)->nullable();
            $table->string('num_telefone_comercial', 12)->nullable();
            $table->integer('pessoa_id')->unsigned();
        });

        Schema::table('tb_telefone', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('id_pessoa')->on('tb_pessoa')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('tb_telefone');
    }
}
