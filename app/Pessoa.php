<?php

namespace Consulta;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pessoa extends Authenticatable
{
    protected $table = 'tb_pessoa';
    public $incrementing = false;
    protected $primaryKey = 'id_pessoa';
    public $timestamps = false;

    protected $fillable = ['id_pessoa', 'pes_tipo', 'pes_cpf', 'pes_nome', 'pes_rg', 'pes_crm', 'pes_data_nascimento', 'pes_sexo', 'email',
        'password', 'pes_permissao', 'pes_data_cadastro', 'remember_token', 'pes_ativo', 'estado_civil_id', 'orgao_expedidor_id',
        'especialidade_id', 'endereco_id'];

    protected $hidden = ['password', 'remember_token'];

    public function estadoCivil()
    {
        return $this->belongsTo('Consulta\EstadoCivil');
    }

    public function orgaoExpedidor()
    {
        return $this->belongsTo('Consulta\OrgaoExpedidor');
    }

    public function especialidade()
    {
        return $this->belongsTo('Consulta\Especialidade');
    }

    public function endereco()
    {
        return $this->belongsTo('Consulta\Endereco');
    }

    public function telefones()
    {
        return $this->hasMany('Consulta\Telefone');
    }

    public function addTelefone(Telefone $tel)
    {
        return $this->telefones()->save($tel);
    }

    public function addEstadoCivil(EstadoCivil $estCivil)
    {
        return $this->estadoCivil()->save($estCivil);
    }

    public static function ProcuraCpf($cpf)
    {
        return Pessoa::where('pes_cpf', $cpf)->first();
    }
}
