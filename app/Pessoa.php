<?php

namespace Consulta;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    public function getPaciente($id)
    {
        return $paciente = DB::table('tb_pessoa')
            ->leftJoin('tb_orgao_expedidor', 'tb_pessoa.orgao_expedidor_id', '=', 'tb_orgao_expedidor.id_orgao_expedidor')
            ->leftJoin('tb_estado_civil', 'tb_pessoa.estado_civil_id', '=', 'tb_estado_civil.id_estado_civil')
            ->leftJoin('tb_telefone', 'tb_telefone.pessoa_id', '=', 'tb_pessoa.id_pessoa')
            ->leftJoin('tb_endereco', 'tb_pessoa.endereco_id', '=', 'tb_endereco.id_endereco')
            ->leftJoin('tb_logradouro', 'tb_endereco.logradouro_id', '=', 'tb_logradouro.id_logradouro')
            ->leftJoin('tb_logradouro_tipo', 'tb_logradouro.logradouro_tipo_id', '=', 'tb_logradouro_tipo.id_logradouro_tipo')
            ->leftJoin('tb_bairro', 'tb_endereco.bairro_id', '=', 'tb_bairro.id_bairro')
            ->leftJoin('tb_cidade', 'tb_bairro.cidade_id', '=', 'tb_cidade.id_cidade')
            ->leftJoin('tb_uf', 'tb_cidade.uf_id', '=', 'tb_uf.id_uf')
            ->select('tb_pessoa.id_pessoa', 'tb_pessoa.pes_cpf', 'tb_pessoa.pes_nome', 'tb_pessoa.pes_rg', 'tb_orgao_expedidor.id_orgao_expedidor',
                'tb_orgao_expedidor.nome_orgao_expedidor', 'tb_pessoa.pes_data_nascimento', 'tb_pessoa.pes_sexo', 'tb_estado_civil.id_estado_civil', 'tb_estado_civil.est_descricao',
                'tb_telefone.id_telefone', 'tb_telefone.num_telefone_celular', 'tb_telefone.id_telefone', 'tb_telefone.num_telefone_residencial', 'tb_telefone.id_telefone',
                'tb_telefone.num_telefone_comercial', 'tb_pessoa.email', 'tb_logradouro_tipo.id_logradouro_tipo', 'tb_logradouro_tipo.tp_log_descricao',
                'tb_logradouro.id_logradouro', 'tb_logradouro.log_descricao', 'tb_endereco.id_endereco', 'tb_endereco.end_complemento', 'tb_endereco.end_numero',
                'tb_endereco.end_cep', 'tb_bairro.id_bairro', 'tb_bairro.bai_nome', 'tb_cidade.id_cidade', 'tb_cidade.cid_nome', 'tb_uf.id_uf', 'tb_uf.uf_descricao')
            ->where('tb_pessoa.id_pessoa', '=', $id)
            ->first();
    }
}
