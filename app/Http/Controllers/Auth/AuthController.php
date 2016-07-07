<?php

namespace Consulta\Http\Controllers\Auth;

use Consulta\Pessoa;
use Validator;
use Consulta\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $dados = Array(
            'pes_tipo' => $request->input('optionsRadios'),
            'pes_cpf' => trim($request->input('pes_cpf')),
            'pes_nome' => trim($request->input('pes_nome')),
            'email' => trim($request->input('email')),
            'password' => trim($request->input('password')),
            'password_confirmation' => trim($request->input('password_confirmation'))
        );

        $validator = Validator::make($dados, $this->validationRulesRegister, $this->validationRulesMensagensRegister);

        if ($validator->fails()) {
            return redirect()->route('auth.register')
                ->withErrors($validator)
                ->withInput();
        }

        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('Y-m-d H:i:s');

        if ($dados['pes_tipo'] == 'Paciente') {
            $array = array('password' => bcrypt($dados['password']), 'pes_permissao' => 1, 'pes_data_cadastro' => $dataAtual);
            $credentials = array_merge($dados, $array);
        } elseif ($dados['pes_tipo'] == 'Médico') {
            $array = array('password' => bcrypt($dados['password']), 'pes_permissao' => 2, 'pes_data_cadastro' => $dataAtual);
            $credentials = array_merge($dados, $array);
        }

        Pessoa::create($credentials);

        return redirect('/');
    }

    public function attempt(Request $request)
    {
        $dados = ['email' => trim($request->input('email')), 'password' => trim($request->input('password'))];
        $remember = $request->has('remember');
        $validator = Validator::make($dados, $this->validationRules, $this->validationRulesMensagens);
        if ($validator->fails()) {
            return redirect()->route('auth.login')->withErrors($validator)->withInput();
        }
        if (! Auth::attempt($dados, $remember)) {
            \Session::flash('flash_message', ['msg'=>'E-mail não cadastrado ou Senha inválida','class'=>'alert-success']);
            return redirect()->route('auth.login');
        }
        return redirect('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    protected $validationRules = [
        'email' => 'required|max:100|email',
        'password' => 'required|min:6|max:15'
    ];

    protected $validationRulesMensagens = [
        'email.required' => 'Campo E-mail é obrigatório!',
        'email.max' => 'Campo E-mail deve conter maximo 100 caracteres!',
        'email.email' => 'O E-mail informando não é valido!',
        'password.required' => 'Campo Senha é obrigatório!',
        'password.min' => 'A senha deve conter no mínimo 6 caracteres!',
        'password.max' => 'Campo Senha deve conter maximo 15 caracteres!'
    ];

    protected $validationRulesRegister = [
        'pes_tipo' => 'required',
        'pes_cpf' => 'required|unique:tb_pessoa',
        'pes_nome' => 'required|max:80',
        'email' => 'required|email|max:100|unique:tb_pessoa',
        'password' => 'required|min:6|max:15',
        'password_confirmation' => 'required|min:6|max:15'
    ];

    protected $validationRulesMensagensRegister = [
        'pes_tipo.required' => 'A identificação é obrigatória!',
        'pes_cpf.required' => 'Campo CPF é obrigatório!',
        'pes_cpf.unique' => 'CPF já cadastrado!',
        'pes_nome.required' => 'Campo Nome é obrigatório!',
        'pes_nome.max' => 'Campo Nome deve conter maximo 80 caracteres!',
        'email.required' => 'Campo E-mail é obrigatório!',
        'email.email' => 'O E-mail informando não é valido!',
        'email.max' => 'Campo E-mail deve conter maximo 100 caracteres!',
        'email.unique' => 'O E-mail informando já está cadastrado!',
        'password.required' => 'Campo Senha é obrigatório!',
        'password.min' => 'A senha deve conter no mínimo 6 caracteres!',
        'password.max' => 'Campo Senha deve conter maximo 15 caracteres!',
        'password_confirmation.required' => 'Campo Confirmação de Senha é obrigatório!'
    ];

}
