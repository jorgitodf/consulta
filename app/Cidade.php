<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'tb_cidade';
    public $incrementing = false;
    protected $primaryKey = 'id_cidade';
    public $timestamps = false;
    public $id_cidade;

    protected $fillable = ['id_cidade', 'cid_nome', 'uf_id'];

    public function uf()
    {
        return $this->belongsTo('Consulta\Uf');
    }

    public function bairros()
    {
        return $this->hasMany('Consulta\Bairro');
    }

    public function addBairro(Bairro $bairro)
    {
        return $this->bairros()->save($bairro);
    }
}
