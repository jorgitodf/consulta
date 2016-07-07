@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.create') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('pes_cpf') ? ' has-error' : '' }}">
                            <label for="pes_cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="pes_cpf" type="text" class="form-control" name="pes_cpf" value="{{ old('pes_cpf') }}">
                                <div>
                                    @if ($errors->has('pes_cpf'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pes_cpf') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pes_nome') ? ' has-error' : '' }}">
                            <label for="pes_nome" class="col-md-4 control-label">Nome Completo</label>

                            <div class="col-md-6">
                                <input id="pes_nome" type="text" class="form-control" name="pes_nome" value="{{ old('pes_nome') }}">
                                <div>
                                @if ($errors->has('pes_nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pes_nome') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmação de Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pes_tipo') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Identifique-se</label>

                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="Paciente">
                                        Paciente
                                    </label>
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="Médico">
                                        Médico
                                    </label>
                                    @if ($errors->has('pes_tipo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pes_tipo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
