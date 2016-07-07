<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    protected $table = 'tb_uf';
    public $incrementing = false;
    protected $primaryKey = 'id_uf';
    public $timestamps = false;

    protected $fillable = ['id_uf', 'uf_descricao'];

    public function cidades()
    {
        return $this->hasMany('Consulta\Cidade');
    }

    public static function getAllUf()
    {
        $uf = Uf::all();
        $option = "<option value=''></option>";
        foreach($uf as $linha) {
            $option .= "<option value='$linha->id_uf'> $linha->uf_descricao</option>";
        }
        return $option;
    }
}
