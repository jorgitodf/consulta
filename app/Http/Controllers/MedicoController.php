<?php

namespace Consulta\Http\Controllers;

use Consulta\Especialidade;
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

class MedicoController extends Controller
{
    protected $uf;
    protected $logTipo;
    protected $orgaoExp;
    protected $estadoCivil;
    protected $especialidade;
    protected $pessoa;
    protected $validacao;
    protected $pessoaModel;

    public function __construct(PessoaRepository $pessoa, Rules $validacao, Pessoa $pessoaModel)
    {
        $this->middleware('auth');
        $this->uf = Uf::getAllUf();
        $this->logTipo = LogradouroTipo::getAllLogradouroTipo();
        $this->orgaoExp = OrgaoExpedidor::getAllOrgaoExpedidor();
        $this->estadoCivil = EstadoCivil::getEstadoCivil();
        $this->especialidade = Especialidade::getAllEspecialidades();
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
        $especialidade = $this->especialidade;
        return view('medico.index', compact('uf', 'logTipo', 'orgaoExp', 'estadoCivil', 'especialidade'));
    }

    public function editar($id)
    {
        $medico = $this->pessoa->buscarPessoa($id);
        $uf = $this->uf;
        $logTipo = $this->logTipo;
        $orgaoExp = $this->orgaoExp;
        $estadoCivil = $this->estadoCivil;
        $especialidade = $this->especialidade;
        return view('medico.editar', compact('medico', 'uf', 'logTipo', 'orgaoExp', 'estadoCivil', 'especialidade'));
    }

    public function atualizar(Request $request)
    {
        $dados = Array(
            'id_pessoa' => trim($request->input('id_pessoa')),
            'pes_cpf' => Format::formataCpf($request->input('pes_cpf')),
            'pes_nome' => trim($request->input('pes_nome')),
            'crm' => trim($request->input('crm')),
            'fk_orgao_expedidor' => $request->input('fk_orgao_expedidor'),
            'especialidade' => $request->input('especialidade'),
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
        $validator = $this->validacao->validacaoAtulizarMedico($dados);
        if ($validator->fails()) {
            return redirect()->route('medico.editar', $dados['id_pessoa'])->withErrors($validator)->withInput();
        }
        $this->pessoa->atualizarPessoa($dados);
        \Session::flash('flash_message', ['msg'=>'Dados Atualizados com Sucesso','class'=>'alert-success']);
        return redirect()->route('medico.editar', $dados['id_pessoa']);

    }

    public function cadastrar(Request $request)
    {
        $dados = Array(
            'id_pessoa' => trim($request->input('id_pessoa')),
            'pes_cpf' => Format::formataCpf($request->input('pes_cpf')),
            'pes_nome' => trim($request->input('pes_nome')),
            'crm' => trim($request->input('crm')),
            'fk_orgao_expedidor' => $request->input('fk_orgao_expedidor'),
            'especialidade' => $request->input('especialidade'),
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
        $validator = $this->validacao->validacaoAtulizarMedico($dados);
        if ($validator->fails()) {
            return redirect()->route('medico.index')->withErrors($validator)->withInput();
        }
        $this->pessoa->criarPessoa($dados);
        \Session::flash('flash_message', ['msg'=>'Dados Cadastrados com Sucesso','class'=>'alert-success']);
        return redirect()->route('medico.index');
    }
}
