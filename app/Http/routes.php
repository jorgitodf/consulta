<?php

Route::get('/', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
Route::get('/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
Route::post('/login', ['as' => 'auth.attempt', 'uses' => 'Auth\AuthController@attempt']);
Route::post('/register', ['as' => 'auth.create', 'uses' => 'Auth\AuthController@create']);
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/paciente', ['as' => 'paciente.index', 'uses' => 'PacienteController@index']);
Route::get('/paciente/editar/{id}', ['as' => 'paciente.editar', 'uses' => 'PacienteController@editar']);
Route::get('/paciente/alterar/{id}', ['as' => 'paciente.alterar', 'uses' => 'PacienteController@alterar']);
Route::post('/paciente/atualizar', ['as' => 'paciente.atualizar', 'uses' => 'PacienteController@atualizar']);
Route::post('/paciente/salvar', ['as' => 'paciente.salvar', 'uses' => 'PacienteController@salvar']);
Route::post('/paciente/cadastrar', ['as' => 'paciente.cadastrar', 'uses' => 'PacienteController@cadastrar']);

Route::get('/medico', ['as' => 'medico.index', 'uses' => 'MedicoController@index']);
Route::get('/medico/editar/{id}', ['as' => 'medico.editar', 'uses' => 'MedicoController@editar']);
Route::post('/medico/atualizar', ['as' => 'medico.atualizar', 'uses' => 'MedicoController@atualizar']);
Route::post('/medico/cadastrar', ['as' => 'medico.cadastrar', 'uses' => 'MedicoController@cadastrar']);


Route::get('/admin', ['as' => 'admin.index', 'uses' => 'AdminController@index']);