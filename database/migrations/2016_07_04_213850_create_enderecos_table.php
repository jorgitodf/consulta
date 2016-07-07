<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->increments('id_endereco')->unsigned();
            $table->string('end_complemento', 100);
            $table->string('end_numero', 10);
            $table->string('end_cep', 8);
            $table->integer('bairro_id')->unsigned();
            $table->mediumInteger('logradouro_id')->unsigned();
        });

        Schema::table('tb_endereco', function (Blueprint $table) {
            $table->foreign('bairro_id')->references('id_bairro')->on('tb_bairro')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('logradouro_id')->references('id_logradouro')->on('tb_logradouro')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('tb_endereco');
    }
}
