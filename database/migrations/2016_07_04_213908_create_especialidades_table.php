<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadesTable extends Migration
{
    public function up()
    {
        Schema::create('tb_especialidade', function (Blueprint $table) {
            $table->smallIncrements('id_especialidade');
            $table->string('nome_especialidade', 50);
        });
    }

    public function down()
    {
        Schema::drop('tb_especialidade');
    }
}
