<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgaoExpedidorsTable extends Migration
{
    public function up()
    {
        Schema::create('tb_orgao_expedidor', function (Blueprint $table) {
            $table->smallIncrements('id_orgao_expedidor');
            $table->string('nome_orgao_expedidor', 130);
        });
    }

    public function down()
    {
        Schema::drop('tb_orgao_expedidor');
    }
}
