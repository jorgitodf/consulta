<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    protected $table = 'tb_logradouro';
    public $incrementing = false;
    protected $primaryKey = 'id_logradouro';
    public $timestamps = false;

    protected $fillable = ['id_logradouro', 'log_descricao', 'logradouro_tipo_id'];

    public function logradouroTipo()
    {
        return $this->belongsTo('Consulta\LogradouroTipo');
    }

    public function enderecos()
    {
        return $this->hasMany('Consulta\Endereco');
    }
}
