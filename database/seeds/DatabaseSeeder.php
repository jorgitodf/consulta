<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UfTableSeeder::class);
        $this->call(LogradouroTipoTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(EspecialidadeTableSeeder::class);
        $this->call(OrgaoExpedidorTableSeeder::class);
    }
}
