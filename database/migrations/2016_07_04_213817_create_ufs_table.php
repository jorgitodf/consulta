<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUfsTable extends Migration
{
    public function up()
    {
        Schema::create('tb_uf', function (Blueprint $table) {
            $table->smallIncrements('id_uf');
            $table->string('uf_descricao', 45);
        });
    }

    public function down()
    {
        Schema::drop('tb_uf');
    }
}
