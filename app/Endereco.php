<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'tb_endereco';
    public $incrementing = false;
    protected $primaryKey = 'id_endereco';
    public $timestamps = false;

    protected $fillable = ['id_endereco', 'end_complemento', 'end_numero', 'end_cep', 'bairro_id', 'logradouro_id'];

    public function bairro()
    {
        return $this->belongsTo('Consulta\Bairro');
    }

    public function logradouro()
    {
        return $this->belongsTo('Consulta\Logradouro');
    }
}
