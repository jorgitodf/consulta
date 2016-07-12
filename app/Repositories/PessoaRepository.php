<?php

namespace Consulta\Repositories;

use Consulta\Logradouro;
use Consulta\Cidade;
use Consulta\Bairro;
use Consulta\Endereco;
use Consulta\Pessoa;
use Consulta\Telefone;
use Illuminate\Support\Facades\DB;


class PessoaRepository
{
    protected $cidade;
    protected $bairro;
    protected $logradouro;
    protected $endereco;
    protected $pessoa;
    protected $telefone;

    public function __construct(Cidade $cidade, Bairro $bairro, Logradouro $logradouro, Endereco $endereco, Pessoa $pessoa, Telefone $telefone)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->logradouro = $logradouro;
        $this->endereco = $endereco;
        $this->pessoa = $pessoa;
        $this->telefone = $telefone;
    }

    public function atualizarPessoa($dados)
    {
        if (isset($dados['crm'])) {

            $this->cidade->create(['cid_nome' => $dados['cid_nome'], 'uf_id' => $dados['uf_descricao']]);
            $id_cidade = DB::getPdo()->lastInsertId();
            $this->bairro->create(['bai_nome' => $dados['bai_nome'], 'cidade_id' => $id_cidade]);
            $id_bairro = DB::getPdo()->lastInsertId();
            $this->logradouro->create(['log_descricao' => $dados['log_descricao'], 'logradouro_tipo_id' => $dados['tp_log_descricao']]);
            $id_logradouro = DB::getPdo()->lastInsertId();
            $this->endereco->create(['end_complemento' => $dados['end_complemento'], 'end_numero' => $dados['end_numero'], 'end_cep' => $dados['end_cep'],
                'bairro_id' => $id_bairro, 'logradouro_id' => $id_logradouro]);
            $id_endereco = DB::getPdo()->lastInsertId();
            $this->pessoa->find($dados['id_pessoa'])->update(['pes_cpf' => $dados['pes_cpf'], 'pes_nome' => $dados['pes_nome'], 'pes_rg' => "",
                'pes_crm' => $dados['crm'], 'pes_data_nascimento' => $dados['pes_data_nascimento'], 'pes_sexo' => $dados['pes_sexo'], 'email' => $dados['email'],
                'estado_civil_id' => $dados['fk_estado_civil'], 'orgao_expedidor_id' => $dados['fk_orgao_expedidor'], 'especialidade_id' => $dados['especialidade'],
                'endereco_id' => $id_endereco]);
            $id_pessoa = $dados['id_pessoa'];
            $this->telefone->create(['num_telefone_celular' => $dados['num_telefone_celular'], 'num_telefone_residencial' => $dados['num_telefone_residencial'],
                'num_telefone_comercial' => $dados['num_telefone_comercial'], 'pessoa_id' => $id_pessoa]);

        } else {
            $this->cidade->create(['cid_nome' => $dados['cid_nome'], 'uf_id' => $dados['uf_descricao']]);
            $id_cidade = DB::getPdo()->lastInsertId();
            $this->bairro->create(['bai_nome' => $dados['bai_nome'], 'cidade_id' => $id_cidade]);
            $id_bairro = DB::getPdo()->lastInsertId();
            $this->logradouro->create(['log_descricao' => $dados['log_descricao'], 'logradouro_tipo_id' => $dados['tp_log_descricao']]);
            $id_logradouro = DB::getPdo()->lastInsertId();
            $this->endereco->create(['end_complemento' => $dados['end_complemento'], 'end_numero' => $dados['end_numero'], 'end_cep' => $dados['end_cep'],
                'bairro_id' => $id_bairro, 'logradouro_id' => $id_logradouro]);
            $id_endereco = DB::getPdo()->lastInsertId();
            $this->pessoa->find($dados['id_pessoa'])->update(['pes_cpf' => $dados['pes_cpf'], 'pes_nome' => $dados['pes_nome'], 'pes_rg' => $dados['pes_rg'],
                'pes_crm' => "", 'pes_data_nascimento' => $dados['pes_data_nascimento'], 'pes_sexo' => $dados['pes_sexo'], 'email' => $dados['email'],
                'estado_civil_id' => $dados['fk_estado_civil'], 'orgao_expedidor_id' => $dados['fk_orgao_expedidor'], 'especialidade_id' => null,
                'endereco_id' => $id_endereco]);
            $id_pessoa = $dados['id_pessoa'];
            $this->telefone->create(['num_telefone_celular' => $dados['num_telefone_celular'], 'num_telefone_residencial' => $dados['num_telefone_residencial'],
                'num_telefone_comercial' => $dados['num_telefone_comercial'], 'pessoa_id' => $id_pessoa]);
        }

    }

    public function criarPessoa($dados)
    {
        if (isset($dados['crm'])) {

            $this->cidade->create(['cid_nome' => $dados['cid_nome'], 'uf_id' => $dados['uf_descricao']]);
            $id_cidade = DB::getPdo()->lastInsertId();
            $this->bairro->create(['bai_nome' => $dados['bai_nome'], 'cidade_id' => $id_cidade]);
            $id_bairro = DB::getPdo()->lastInsertId();
            $this->logradouro->create(['log_descricao' => $dados['log_descricao'], 'logradouro_tipo_id' => $dados['tp_log_descricao']]);
            $id_logradouro = DB::getPdo()->lastInsertId();
            $this->endereco->create(['end_complemento' => $dados['end_complemento'], 'end_numero' => $dados['end_numero'], 'end_cep' => $dados['end_cep'],
                'bairro_id' => $id_bairro, 'logradouro_id' => $id_logradouro]);
            $id_endereco = DB::getPdo()->lastInsertId();
            $this->pessoa->find($dados['id_pessoa'])->update(['pes_cpf' => $dados['pes_cpf'], 'pes_nome' => $dados['pes_nome'], 'pes_rg' => "",
                'pes_crm' => $dados['crm'], 'pes_data_nascimento' => $dados['pes_data_nascimento'], 'pes_sexo' => $dados['pes_sexo'], 'email' => $dados['email'],
                'estado_civil_id' => $dados['fk_estado_civil'], 'orgao_expedidor_id' => $dados['fk_orgao_expedidor'], 'especialidade_id' => $dados['especialidade'],
                'endereco_id' => $id_endereco]);
            $id_pessoa = $dados['id_pessoa'];
            $this->telefone->create(['num_telefone_celular' => $dados['num_telefone_celular'], 'num_telefone_residencial' => $dados['num_telefone_residencial'],
                'num_telefone_comercial' => $dados['num_telefone_comercial'], 'pessoa_id' => $id_pessoa]);

        } else {
            $this->cidade->create(['cid_nome' => $dados['cid_nome'], 'uf_id' => $dados['uf_descricao']]);
            $id_cidade = DB::getPdo()->lastInsertId();
            $this->bairro->create(['bai_nome' => $dados['bai_nome'], 'cidade_id' => $id_cidade]);
            $id_bairro = DB::getPdo()->lastInsertId();
            $this->logradouro->create(['log_descricao' => $dados['log_descricao'], 'logradouro_tipo_id' => $dados['tp_log_descricao']]);
            $id_logradouro = DB::getPdo()->lastInsertId();
            $this->endereco->create(['end_complemento' => $dados['end_complemento'], 'end_numero' => $dados['end_numero'], 'end_cep' => $dados['end_cep'],
                'bairro_id' => $id_bairro, 'logradouro_id' => $id_logradouro]);
            $id_endereco = DB::getPdo()->lastInsertId();
            $this->pessoa->find($dados['id_pessoa'])->update(['pes_cpf' => $dados['pes_cpf'], 'pes_nome' => $dados['pes_nome'], 'pes_rg' => $dados['pes_rg'],
                'pes_crm' => "", 'pes_data_nascimento' => $dados['pes_data_nascimento'], 'pes_sexo' => $dados['pes_sexo'], 'email' => $dados['email'],
                'estado_civil_id' => $dados['fk_estado_civil'], 'orgao_expedidor_id' => $dados['fk_orgao_expedidor'], 'especialidade_id' => null,
                'endereco_id' => $id_endereco]);
            $id_pessoa = $dados['id_pessoa'];
            $this->telefone->create(['num_telefone_celular' => $dados['num_telefone_celular'], 'num_telefone_residencial' => $dados['num_telefone_residencial'],
                'num_telefone_comercial' => $dados['num_telefone_comercial'], 'pessoa_id' => $id_pessoa]);
        }

    }

    public function buscarPessoa($id)
    {
        return $this->pessoa->find($id);
    }

}