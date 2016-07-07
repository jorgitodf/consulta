<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'tb_telefone';
    public $incrementing = false;
    protected $primaryKey = 'id_telefone';
    public $timestamps = false;

    protected $fillable = ['id_telefone', 'num_telefone_celular', 'num_telefone_residencial', 'num_telefone_comercial', 'pessoa_id'];

    public function pessoa()
    {
        return $this->belongsTo('Consulta\Pessoa');
    }
}
