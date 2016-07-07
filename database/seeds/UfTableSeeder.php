<?php

use Illuminate\Database\Seeder;

class UfTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'AC - Acre',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'AL - Alagoas',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'AP - Amapá',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'AM - Amazonas',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'BA - Bahia',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'CE - Ceará',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'DF - Distrito Federal',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'ES - Espírito Santo',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'GO - Goiás',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'MA - Maranhão',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'MT - Mato Grosso',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'MS - Mato Grosso do Sul',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'MG - Minas Gerais',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'PA - Pará',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'PB - Paraíba',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'PR - Paraná',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'PE - Pernambuco',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'PI - Piauí',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'RJ - Rio de Janeiro',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'RN - Rio Grande do Norte',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'RS - Rio Grande do Sul',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'RO - Rondônia',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'RR - Roraima',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'SC - Santa Catarina',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'SP - São Paulo',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'SE - Sergipe',
        ]);
        DB::table('tb_uf')->insert([
            'uf_descricao'=>'TO - Tocantins',
        ]);
    }
}
