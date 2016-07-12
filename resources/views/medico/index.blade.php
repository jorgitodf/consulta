@extends('layouts.app')
@section('content')
    <div class="row-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Cadastro de Médico
                </h3>
            </div><br/>
            <form class="form-horizontal" role="form" method="post" action="{{ route('medico.cadastrar') }}">
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="pes_cpf" class="col-sm-3 control-label">CPF:</label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control input-sm" name="id_pessoa" id="id_pessoa" value="">
                                <input type="text" class="form-control input-sm" name="pes_cpf" id="cpf" placeholder="CPF" value="" >
                            </div><span class="erro_cidade">@if ($errors->has('pes_cpf')){{ $errors->first('pes_cpf') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="pes_nome" class="col-sm-3 control-label">Nome:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="pes_nome" id="pes_nome" placeholder="Primeiro Nome" value="" >
                            </div><span class="erro_cidade">@if ($errors->has('pes_nome')){{ $errors->first('pes_nome') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="crm" class="col-sm-3 control-label">CRM:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="crm" id="crm" value="{{ old('crm') }}">
                            </div><span class="erro_cidade">@if ($errors->has('crm')){{ $errors->first('crm') }}@endif</span>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="fk_orgao_expedidor" class="col-sm-3 control-label">Órgão Expedidor:</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" name="fk_orgao_expedidor" id="fk_orgao_expedidor" >
                                    {!! $orgaoExp !!}
                                </select>
                            </div><span class="erro_cidade">@if ($errors->has('fk_orgao_expedidor')){{ $errors->first('fk_orgao_expedidor') }}@endif</span>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="especialidade" class="col-sm-3 control-label">Especialidade:</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" name="especialidade" id="especialidade" >
                                    <option value="{{ old('especialidade') }}"></option>
                                    @foreach($especialidade as $item)
                                        <option value="{{ $item->id_especialidade }}">{{ $item->nome_especialidade }}</option>
                                    @endforeach
                                </select>
                            </div><span class="erro_cidade">@if ($errors->has('especialidade')){{ $errors->first('especialidade') }}@endif</span>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="pes_data_nascimento" class="col-sm-3 control-label">Data de Nascimento:</label>
                            <div class="col-sm-5">
                                <input class="form-control input-sm" type="date" name="pes_data_nascimento" id="pes_data_nascimento" value="{{ old('pes_data_nascimento') }}">
                            </div><span class="erro_cidade">@if ($errors->has('pes_data_nascimento')){{ $errors->first('pes_data_nascimento') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="pes_sexo" class="col-sm-3 control-label">Sexo:</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" name="pes_sexo" id="pes_sexo">
                                    <option value=""></option>
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div><span class="erro_cidade">@if ($errors->has('pes_sexo')){{ $errors->first('pes_sexo') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="fk_estado_civil" class="col-sm-3 control-label">Estado Civil:</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" name="fk_estado_civil" id="fk_estado_civil">
                                    {!! $estadoCivil !!}
                                </select>
                            </div><span class="erro_cidade">@if ($errors->has('fk_estado_civil')){{ $errors->first('fk_estado_civil') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="num_telefone_celular" class="col-sm-3 control-label">Telefone Celular:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="num_telefone_celular" id="num_celular" value="{{ old('num_telefone_celular') }}">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="num_telefone_residencial" class="col-sm-3 control-label">Telefone Residencial:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="num_telefone_residencial" id="num_telefone_residencial" value="{{ old('num_telefone_residencial') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label for="num_telefone_comercial" class="col-sm-3 control-label">Telefone Comercial:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="num_telefone_comercial" id="num_telefone_comercial" value="{{ old('num_telefone_comercial') }}">
                            </div>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="email" class="col-sm-3 control-label">E-mail:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="email" id="email" value="">
                            </div><span class="erro_cidade">@if ($errors->has('email')){{ $errors->first('email') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="tp_log_descricao" class="col-sm-3 control-label">Tipo Logradouro:</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" name="tp_log_descricao" id="tp_log_descricao">
                                    {!! $logTipo !!}
                                </select>
                            </div><span class="erro_cidade">@if ($errors->has('tp_log_descricao')){{ $errors->first('tp_log_descricao') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="log_descricao" class="col-sm-3 control-label">Logradouro:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="log_descricao" id="log_descricao" value="{{ old('log_descricao') }}">
                            </div><span class="erro_cidade">@if ($errors->has('log_descricao')){{ $errors->first('log_descricao') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="end_complemento" class="col-sm-3 control-label">Complemento:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="end_complemento" id="end_complemento" placeholder="Casa ou Apto" value="{{ old('end_complemento') }}">
                            </div><span class="erro_cidade">@if ($errors->has('end_complemento')){{ $errors->first('end_complemento') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="end_numero" class="col-sm-3 control-label">Número:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="end_numero" id="end_numero" value="{{ old('end_numero') }}">
                            </div><span class="erro_cidade">@if ($errors->has('end_numero')){{ $errors->first('end_numero') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="end_cep" class="col-sm-3 control-label">Cep:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="end_cep" id="cep" value="{{ old('end_cep') }}">
                            </div><span class="erro_cidade">@if ($errors->has('end_cep')){{ $errors->first('end_cep') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="bai_nome" class="col-sm-3 control-label">Bairro:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="bai_nome" id="bai_nome" value="{{ old('bai_nome') }}">
                            </div><span class="erro_cidade">@if ($errors->has('bai_nome')){{ $errors->first('bai_nome') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="cid_nome" class="col-sm-3 control-label">Cidade:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" name="cid_nome" id="cid_nome" value="{{ old('cid_nome') }}">
                            </div><span class="erro_cidade">@if ($errors->has('cid_nome')){{ $errors->first('cid_nome') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="uf_descricao" class="col-sm-3 control-label">UF:</label>
                            <div class="col-sm-5">
                                <select class="form-control input-sm" name="uf_descricao" id="uf_descricao">
                                    {!!$uf!!}
                                </select>
                            </div><span class="erro_cidade">@if ($errors->has('uf_descricao')){{ $errors->first('uf_descricao') }}@endif</span>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <p class='sucesso'></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm col-sm-5 botao_salvar_paciente">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="col-sm col-sm-4 flash_message">
                        @if(Session::has('flash_message'))
                            <span class="alert {{ Session::get('flash_message')['class'] }}"> {{ Session::get('flash_message')['msg'] }}</span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
