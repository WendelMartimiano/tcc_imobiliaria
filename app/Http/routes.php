<?php

//Grupo de rotas do sistema
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){

    //Rota para a rotina de usuário
    Route::controller('usuarios', 'ImobWeb\UsuarioController');
    
    //Rota para a rotina de empresa
    Route::controller('imobiliaria', 'ImobWeb\ImobiliariaController');

    //Rota para a rotina de relatórios
    Route::get('relatorios', function () {
        return view('imobweb.relatorios');
    });

    //Rota para a rotina de contratos
    Route::controller('contratos', 'ImobWeb\ContratoController');
    
    //Rota para a rotina de clientes
    Route::controller('clientes', 'ImobWeb\ClienteController');

    //Rota para a rotina de vendas
    Route::controller('vendas', 'ImobWeb\VendaController');

    //Rota para a rotina de funcionários
    Route::controller('funcionarios', 'ImobWeb\FuncionarioController');

    //Rota para a rotina de imóveis
    Route::controller('imoveis', 'ImobWeb\ImovelController');

    //Rota Home do Sistema
    Route::controller('/', 'ImobWeb\HomeController');
});

//Grupo de rotas do site
Route::group(['prefix' => 'site'], function () {

   // Route::get('teste/{mensagem}', 'Site\UsuarioController@postMailConfirmacao');

    //Rota da tela de confirmação de e-mail
    Route::get('confirmacao/{titulo?}', function ($titulo = 'Confirmação de E-mail') {
        return view('site.confirma_email', compact('titulo'));
    });

    //Rotas de cadastro de usuário
    Route::get('usuario/{id}', 'Site\UsuarioController@getIndex');
    Route::post('usuario', 'Site\UsuarioController@postAdicionarUsuario');

    //Rotas de cadastro de empresa
    Route::get('empresa/{id}', 'Site\EmpresaController@getIndex');
    Route::post('empresa', 'Site\EmpresaController@postAdicionarEmpresa');

    //Rota de envio de e-mail de contato do site
    Route::post('send_mail', 'Site\PlanoController@postMailContato');

    //Rota base do site
    Route::controller('/', 'Site\PlanoController');
});

// Rotas de autenticação
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Rotas de registro de usuários
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



Route::get('/pdf', function () {
    return PDF::loadView('teste')->stream('contrato.pdf');
});

Route::get('/', function () {
    return view('welcome');
});