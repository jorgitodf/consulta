<?php

namespace Consulta\Http\Controllers;

use Illuminate\Http\Request;
use Consulta\Http\Requests;
use Consulta\EstadoCivil;
use Consulta\LogradouroTipo;
use Consulta\OrgaoExpedidor;
use Consulta\Uf;
use Consulta\Pessoa;
use Consulta\Repositories\PessoaRepository;
use Consulta\Helpers\Format;
use Consulta\Helpers\Rules;
use Validator;

class PacienteController extends Controller
{
    public $uf;
    public $logTipo;
    public $orgaoExp;
    public $estadoCivil;
    protected $pessoa;
    public $validacao;
    protected $pessoaModel;

    public function __construct(PessoaRepository $pessoa, Rules $validacao, Pessoa $pessoaModel)
    {
        $this->middleware('auth');
        $this->uf = Uf::getAllUf();
        $this->logTipo = LogradouroTipo::getAllLogradouroTipo();
        $this->orgaoExp = OrgaoExpedidor::getAllOrgaoExpedidor();
        $this->estadoCivil = EstadoCivil::getEstadoCivil();
        $this->pessoa = $pessoa;
        $this->validacao = $validacao;
        $this->pessoaModel = $pessoaModel;
    }

    public function index()
    {
        $uf = $this->uf;
        $logTipo = $this->logTipo;
        $orgaoExp = $this->orgaoExp;
        $estadoCivil = $this->estadoCivil;
        return view('paciente.index', compact('uf', 'logTipo', 'orgaoExp', 'estadoCivil'));
    }

    public function editar($id)
    {
        $paciente = $this->pessoa->buscarPessoa($id);
        $uf = $this->uf;
        $logTipo = $this->logTipo;
        $orgaoExp = $this->orgaoExp;
        $estadoCivil = $this->estadoCivil;
        return view('paciente.editar', compact('paciente', 'uf', 'logTipo', 'orgaoExp', 'estadoCivil'));
    }

    public function atualizar(Request $request)
    {
        $dados = Array(
            'id_pessoa' => trim($request->input('id_pessoa')),
            'pes_cpf' => Format::formataCpf($request->input('pes_cpf')),
            'pes_nome' => trim($request->input('pes_nome')),
            'pes_rg' => trim($request->input('pes_rg')),
            'fk_orgao_expedidor' => $request->input('fk_orgao_expedidor'),
            'pes_data_nascimento' => $request->input('pes_data_nascimento'),
            'pes_sexo' => $request->input('pes_sexo'),
            'fk_estado_civil' => $request->input('fk_estado_civil'),
            'num_telefone_celular' => Format::formataTelefone($request->input('num_telefone_celular')),
            'num_telefone_residencial' => Format::formataTelefone($request->input('num_telefone_residencial')),
            'num_telefone_comercial' => Format::formataTelefone($request->input('num_telefone_comercial')),
            'email' => trim($request->input('email')),
            'tp_log_descricao' => $request->input('tp_log_descricao'),
            'log_descricao' => trim($request->input('log_descricao')),
            'end_complemento' => trim($request->input('end_complemento')),
            'end_numero' => trim($request->input('end_numero')),
            'end_cep' => Format::formataCep($request->input('end_cep')),
            'bai_nome' => trim($request->input('bai_nome')),
            'cid_nome' => trim($request->input('cid_nome')),
            'uf_descricao' => $request->input('uf_descricao')
        );
        $validator = $this->validacao->validacaoAtulizarPaciente($dados);
        if ($validator->fails()) {
            return redirect()->route('paciente.editar', $dados['id_pessoa'])->withErrors($validator)->withInput();
        }
        $this->pessoa->atualizarPessoa($dados);
        \Session::flash('flash_message', ['msg'=>'Dados Atualizados com Sucesso','class'=>'alert-success']);
        return redirect()->route('paciente.editar', $dados['id_pessoa']);

    }

    public function alterar($id)
    {
        $paciente = $this->pessoaModel->getPaciente($id);

        return view('paciente.alterar', compact('paciente'));
    }

    public function salvar(Request $request)
    {
        $dados = Array(
            'id_pessoa' => trim($request->input('id_pessoa')),
            'pes_cpf' => Format::formataCpf($request->input('pes_cpf')),
            'pes_nome' => trim($request->input('pes_nome')),
            'pes_rg' => trim($request->input('pes_rg')),
            'fk_orgao_expedidor' => $request->input('fk_orgao_expedidor'),
            'pes_data_nascimento' => $request->input('pes_data_nascimento'),
            'pes_sexo' => $request->input('pes_sexo'),
            'fk_estado_civil' => $request->input('fk_estado_civil'),
            'num_telefone_celular' => Format::formataTelefone($request->input('num_telefone_celular')),
            'num_telefone_residencial' => Format::formataTelefone($request->input('num_telefone_residencial')),
            'num_telefone_comercial' => Format::formataTelefone($request->input('num_telefone_comercial')),
            'email' => trim($request->input('email')),
            'tp_log_descricao' => $request->input('tp_log_descricao'),
            'log_descricao' => trim($request->input('log_descricao')),
            'end_complemento' => trim($request->input('end_complemento')),
            'end_numero' => trim($request->input('end_numero')),
            'end_cep' => Format::formataCep($request->input('end_cep')),
            'bai_nome' => trim($request->input('bai_nome')),
            'cid_nome' => trim($request->input('cid_nome')),
            'uf_descricao' => $request->input('uf_descricao')
        );
        $validator = $this->validacao->validacaoAtulizarPaciente($dados);
        if ($validator->fails()) {
            return redirect()->route('paciente.alterar', $dados['id_pessoa'])->withErrors($validator)->withInput();
        }
        $this->pessoa->atualizarPessoa($dados);
        \Session::flash('flash_message', ['msg'=>'Dados Atualizados com Sucesso','class'=>'alert-success']);
        return redirect()->route('paciente.alterar', $dados['id_pessoa']);
    }

    public function cadastrar(Request $request)
    {
        $dados = Array(
            'id_pessoa' => trim($request->input('id_pessoa')),
            'pes_cpf' => Format::formataCpf($request->input('pes_cpf')),
            'pes_nome' => trim($request->input('pes_nome')),
            'pes_rg' => trim($request->input('pes_rg')),
            'fk_orgao_expedidor' => $request->input('fk_orgao_expedidor'),
            'pes_data_nascimento' => $request->input('pes_data_nascimento'),
            'pes_sexo' => $request->input('pes_sexo'),
            'fk_estado_civil' => $request->input('fk_estado_civil'),
            'num_telefone_celular' => Format::formataTelefone($request->input('num_telefone_celular')),
            'num_telefone_residencial' => Format::formataTelefone($request->input('num_telefone_residencial')),
            'num_telefone_comercial' => Format::formataTelefone($request->input('num_telefone_comercial')),
            'email' => trim($request->input('email')),
            'tp_log_descricao' => $request->input('tp_log_descricao'),
            'log_descricao' => trim($request->input('log_descricao')),
            'end_complemento' => trim($request->input('end_complemento')),
            'end_numero' => trim($request->input('end_numero')),
            'end_cep' => Format::formataCep($request->input('end_cep')),
            'bai_nome' => trim($request->input('bai_nome')),
            'cid_nome' => trim($request->input('cid_nome')),
            'uf_descricao' => $request->input('uf_descricao')
        );
        $validator = $this->validacao->validacaoAtulizarPaciente($dados);
        if ($validator->fails()) {
            return redirect()->route('paciente.index')->withErrors($validator)->withInput();
        }
        $this->pessoa->criarPessoa($dados);
        \Session::flash('flash_message', ['msg'=>'Dados Cadastrados com Sucesso','class'=>'alert-success']);
        return redirect()->route('paciente.index');
    }

}
