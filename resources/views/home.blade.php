@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Página Inicial do Sistema</div>
                <div class="panel-body">
                    @if(Auth::user()->pes_permissao == 1 && Auth::user()->pes_data_nascimento == "")
                        {!! "Prezado Paciente, o seu cadastro está incompleto, favor atualizar seus dados cadastrais clicando <a href=".route('paciente.editar', Auth::user()->id_pessoa).">Aqui</a>" !!}
                    @elseif(Auth::user()->pes_permissao == 2 && Auth::user()->pes_data_nascimento == "")
                        {!! "Prezado Médico, o seu cadastro está incompleto, favor atualizar seus dados cadastrais clicando <a href=".route('medico.editar', Auth::user()->id_pessoa).">Aqui</a>" !!}
                    @else
                        {!! "<p>Dados Atualizados</p>" !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

