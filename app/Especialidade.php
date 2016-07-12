<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $table = 'tb_especialidade';
    public $incrementing = false;
    protected $primaryKey = 'id_especialidade';
    public $timestamps = false;

    protected $fillable = ['id_especialidade', 'nome_especialidade'];

    public function especialidades()
    {
        return $this->hasMany('Consulta\Pessoa');
    }

    public static function getAllEspecialidades()
    {
        return Especialidade::all();
    }
}
