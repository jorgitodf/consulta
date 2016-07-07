<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    public function up()
    {
        Schema::create('tb_pessoa', function (Blueprint $table) {
            $table->increments('id_pessoa');
            $table->enum('pes_tipo', ['Médico', 'Paciente', 'Administrador'])->nullable();
            $table->bigInteger('pes_cpf');
            $table->string('pes_nome', 80);
            $table->string('pes_rg', 12)->nullable();
            $table->string('pes_crm', 7)->nullable();
            $table->date('pes_data_nascimento')->nullable();
            $table->enum('pes_sexo', ['M', 'F'])->nullable();
            $table->string('email', 80)->unique();
            $table->string('password', 200);
            $table->char('pes_permissao', 1);
            $table->dateTime('pes_data_cadastro');
            $table->rememberToken();
            $table->enum('pes_ativo', ['1', '0'])->default('1');
            $table->smallInteger('estado_civil_id')->unsigned()->nullable();
            $table->smallInteger('orgao_expedidor_id')->unsigned()->nullable();
            $table->smallInteger('especialidade_id')->unsigned()->nullable();
            $table->integer('endereco_id')->unsigned()->nullable();
        });

        Schema::table('tb_pessoa', function (Blueprint $table) {
            $table->foreign('estado_civil_id')->references('id_estado_civil')->on('tb_estado_civil')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('orgao_expedidor_id')->references('id_orgao_expedidor')->on('tb_orgao_expedidor')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('especialidade_id')->references('id_especialidade')->on('tb_especialidade')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('endereco_id')->references('id_endereco')->on('tb_endereco')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('tb_pessoa');
    }
}
