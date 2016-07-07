<?php

namespace Consulta\Http\Controllers;

use Illuminate\Http\Request;
use Consulta\Http\Requests;
use Consulta\EstadoCivil;
use Consulta\LogradouroTipo;
use Consulta\OrgaoExpedidor;
use Consulta\Uf;
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

    public function __construct(PessoaRepository $pessoa, Rules $validacao)
    {
        $this->middleware('auth');
        $this->uf = Uf::getAllUf();
        $this->logTipo = LogradouroTipo::getAllLogradouroTipo();
        $this->orgaoExp = OrgaoExpedidor::getAllOrgaoExpedidor();
        $this->estadoCivil = EstadoCivil::getEstadoCivil();
        $this->pessoa = $pessoa;
        $this->validacao = $validacao;
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

    public function alterar($id)
    {
        echo $id;
        /*
        $paciente = $this->pessoa->buscarPessoa($id);

        retornar uma consulta com todos os dados do paciente preenchidos para alteração/atualização de dados

        return view('paciente.editar', compact('')); */
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



    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }



    protected $validationRules = [
        'pes_cpf' => 'required',
        'pes_nome' => 'required',
        'pes_sobrenome' => 'required',
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
        'pes_sobrenome.required' => 'Campo Sobrenome é obrigatório!',
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
}
