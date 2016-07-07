<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'tb_bairro';
    public $incrementing = false;
    protected $primaryKey = 'id_bairro';
    public $timestamps = false;

    protected $fillable = ['id_bairro', 'bai_nome', 'cidade_id'];

    public function cidade()
    {
        return $this->belongsTo('Consulta\Cidade');
    }

    public function enderecos()
    {
        return $this->hasMany('Consulta\Endereco');
    }
}
