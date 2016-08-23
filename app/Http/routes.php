<?php

//Grupo de rotas do sistema
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    
    Route::get('imobiliaria', function () {
        return view('imobweb.imobiliaria');
    });
    Route::get('relatorios', function () {
        return view('imobweb.relatorios');
    });
    Route::get('contratos', function () {
        return view('imobweb.contratos');
    });
    Route::get('clientes', function () {
        return view('imobweb.clientes');
    });
    Route::get('funcionarios', function () {
        return view('imobweb.funcionarios');
    });
    Route::get('imoveis', function () {
        return view('imobweb.imoveis');
    });
    Route::get('/', function () {
        return view('imobweb.dashboard');
    });
});

//Grupo de rotas do site
Route::group(['prefix' => 'site'], function () {

   // Route::get('teste/{mensagem}', 'Site\UsuarioController@postMailConfirmacao');

    Route::get('confirmacao/{titulo?}', function ($titulo = 'Confirmação de E-mail') {
        return view('site.confirma_email', compact('titulo'));
    });

    Route::get('usuario/{id}', 'Site\UsuarioController@getIndex');
    Route::post('usuario', 'Site\UsuarioController@postAdicionarUsuario');

    Route::get('empresa/{id}', 'Site\EmpresaController@getIndex');
    Route::post('empresa', 'Site\EmpresaController@postAdicionarEmpresa');

    Route::post('send_mail', 'Site\PlanoController@postMailContato');

    Route::controller('/', 'Site\PlanoController');
});

// Rotas de autenticação
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Rotas de registro de usuários
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/', function () {
    return view('welcome');
});
