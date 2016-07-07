<?php

use Illuminate\Database\Seeder;

class EstadoCivilTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tb_estado_civil')->insert([
            'est_descricao'=>'Solteiro(a)'
        ]);
        DB::table('tb_estado_civil')->insert([
            'est_descricao'=>'Casado(a)'
        ]);
        DB::table('tb_estado_civil')->insert([
            'est_descricao'=>'Divorciado(a)'
        ]);
        DB::table('tb_estado_civil')->insert([
            'est_descricao'=>'Viúvo(a)'
        ]);
        DB::table('tb_estado_civil')->insert([
            'est_descricao'=>'Desconhecido'
        ]);
    }
}
