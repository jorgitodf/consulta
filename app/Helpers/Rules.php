<?php

namespace Consulta\Helpers;

use Validator;

class Rules
{

    public function validacaoAtulizarPaciente($dados) {

        $validator = Validator::make($dados, $this->validationRules, $this->validationRulesMensagens);

        return $validator;
    }

    protected $validationRules = [
        'pes_cpf' => 'required',
        'pes_nome' => 'required',
        'pes_rg' => 'required',
        'fk_orgao_expedidor' => 'required',
        'pes_data_nascimento' => 'required',
        'pes_sexo' => 'required',
        'fk_estado_civil' => 'required',
        'email' => 'required',
        'tp_log_descricao' => 'required',
        'log_descricao' => 'required',
        'end_complemento' => 'required',
        'end_numero' => 'required',
        'end_cep' => 'required',
        'cid_nome' => 'required',
        'bai_nome' => 'required|min:5',
        'uf_descricao' => 'required',
    ];


    protected $validationRulesMensagens = [
        'pes_cpf.required' => 'Campo CPF é obrigatório!',
        'pes_nome.required' => 'Campo Nome é obrigatório!',
        'pes_rg.required' => 'Campo RG é obrigatório!',
        'fk_orgao_expedidor.required' => 'Campo Órgão Expedidor é obrigatório!',
        'pes_data_nascimento.required' => 'Campo Data Nascimento é obrigatório!',
        'pes_sexo.required' => 'Campo Sexo é obrigatório!',
        'fk_estado_civil.required' => 'Campo Estado Civil é obrigatório!',
        'email.required' => 'Campo E-mail é obrigatório!',
        'tp_log_descricao.required' => 'Campo Tipo Logradouro é obrigatório!',
        'log_descricao.required' => 'Campo Logradouro é obrigatório!',
        'end_complemento.required' => 'Campo Complemento é obrigatório!',
        'end_numero.required' => 'Campo Número é obrigatório!',
        'end_cep.required' => 'Campo CEP é obrigatório!',
        'cid_nome.required' => 'Campo Cidade é obrigatório!',
        'bai_nome.required' => 'Campo Bairro é obrigatório!',
        'bai_nome.min' => 'Campo Bairro com no mínimo 5 caracteres!',
        'uf_descricao.required' => 'Campo UF é obrigatório!'
    ];


    public function validacaoAtulizarMedico($dados) {

        $validator = Validator::make($dados, $this->validationRulesMedico, $this->validationRulesMensagensMedico);

        return $validator;
    }

    protected $validationRulesMedico = [
        'pes_cpf' => 'required',
        'pes_nome' => 'required',
        'crm' => 'required',
        'fk_orgao_expedidor' => 'required',
        'especialidade' => 'required',
        'pes_data_nascimento' => 'required',
        'pes_sexo' => 'required',
        'fk_estado_civil' => 'required',
        'email' => 'required',
        'tp_log_descricao' => 'required',
        'log_descricao' => 'required',
        'end_complemento' => 'required',
        'end_numero' => 'required',
        'end_cep' => 'required',
        'cid_nome' => 'required',
        'bai_nome' => 'required|min:5',
        'uf_descricao' => 'required',
    ];


    protected $validationRulesMensagensMedico = [
        'pes_cpf.required' => 'Campo CPF é obrigatório!',
        'pes_nome.required' => 'Campo Nome é obrigatório!',
        'crm.required' => 'Campo CRM é obrigatório!',
        'fk_orgao_expedidor.required' => 'Campo Órgão Expedidor é obrigatório!',
        'especialidade.required' => 'Campo Especialidade é obrigatório!',
        'pes_data_nascimento.required' => 'Campo Data Nascimento é obrigatório!',
        'pes_sexo.required' => 'Campo Sexo é obrigatório!',
        'fk_estado_civil.required' => 'Campo Estado Civil é obrigatório!',
        'email.required' => 'Campo E-mail é obrigatório!',
        'tp_log_descricao.required' => 'Campo Tipo Logradouro é obrigatório!',
        'log_descricao.required' => 'Campo Logradouro é obrigatório!',
        'end_complemento.required' => 'Campo Complemento é obrigatório!',
        'end_numero.required' => 'Campo Número é obrigatório!',
        'end_cep.required' => 'Campo CEP é obrigatório!',
        'cid_nome.required' => 'Campo Cidade é obrigatório!',
        'bai_nome.required' => 'Campo Bairro é obrigatório!',
        'bai_nome.min' => 'Campo Bairro com no mínimo 5 caracteres!',
        'uf_descricao.required' => 'Campo UF é obrigatório!'
    ];

}