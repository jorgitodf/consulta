<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogradouroTiposTable extends Migration
{
    public function up()
    {
        Schema::create('tb_logradouro_tipo', function (Blueprint $table) {
            $table->smallIncrements('id_logradouro_tipo');
            $table->string('tp_log_descricao', 50);
        });
    }

    public function down()
    {
        Schema::drop('tb_logradouro_tipo');
    }
}
