<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'site'], function () {
    Route::get('usuario/{id}', 'Site\UsuarioController@getIndex');
    Route::post('usuario', 'Site\UsuarioController@postAdicionarUsuario');

    Route::get('empresa/{id}', 'Site\EmpresaController@getIndex');
    Route::post('empresa', 'Site\EmpresaController@postAdicionarEmpresa');

    Route::post('send_mail', 'Site\EmpresaController@postMailContato');
    //Route::post('send_mail', 'Site\MailController@mailContato');

    Route::controller('/', 'Site\PlanoController');
});

Route::get('email', function (){
    Mail::raw('Mensagem de teste', function ($m){
       $m->to('wendelprogrammer@gmail.com', 'Fulano')->subject('Tcc teste');
    });
});


/*
 Teste de submissão de formulario
Route::post('/site/send_mail', function(Illuminate\Http\Request $request){
    dd($request->all());
});

Route::get('empresa/{titulo?}', function ($titulo = 'Cadastro de Empresa') {
    return view('site.empresa', compact('titulo'));
});

Route::get('site/empresas/{id}/{nome?}', function ($id, $nome = 'Wendel') {
    dd($id, $nome);
});

Route::get('relacionamentos', function (){
    //dd(App\Models\Plano::find(\App\Models\OpcoesMenu::all()->count())->getOpcoes()->get()->toArray());
});