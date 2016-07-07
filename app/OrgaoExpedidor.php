<?php

namespace Consulta;

use Illuminate\Database\Eloquent\Model;

class OrgaoExpedidor extends Model
{
    protected $table = 'tb_orgao_expedidor';
    public $incrementing = false;
    protected $primaryKey = 'id_orgao_expedidor';
    public $timestamps = false;

    protected $fillable = ['id_orgao_expedidor', 'nome_orgao_expedidor'];

    public function pessoas()
    {
        return $this->hasMany('Consulta\Pessoa');
    }

    public static function getAllOrgaoExpedidor()
    {
        $orgao = OrgaoExpedidor::all();
        $option = "<option value=''></option>";
        foreach($orgao as $linha) {
            $option .= "<option value='$linha->id_orgao_expedidor'> $linha->nome_orgao_expedidor</option>";
        }
        return $option;
    }
}
