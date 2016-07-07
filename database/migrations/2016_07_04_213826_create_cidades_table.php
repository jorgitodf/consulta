<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    public function up()
    {
        Schema::create('tb_cidade', function (Blueprint $table) {
            $table->increments('id_cidade');
            $table->string('cid_nome', 80);
            $table->smallInteger('uf_id')->unsigned();
        });

        Schema::table('tb_cidade', function (Blueprint $table) {
            $table->foreign('uf_id')->references('id_uf')->on('tb_uf')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('tb_cidade');
    }
}
