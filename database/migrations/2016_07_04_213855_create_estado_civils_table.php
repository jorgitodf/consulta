<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoCivilsTable extends Migration
{
    public function up()
    {
        Schema::create('tb_estado_civil', function (Blueprint $table) {
            $table->smallIncrements('id_estado_civil');
            $table->string('est_descricao', 20);
        });
    }

    public function down()
    {
        Schema::drop('tb_estado_civil');
    }
}
