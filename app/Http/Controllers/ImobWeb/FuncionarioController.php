<?php

namespace App\Http\Controllers\ImobWeb;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Empresa;
use Illuminate\Validation\Factory;

class FuncionarioController extends Controller
{

    public function __construct(Request $request, Funcionario $funcionario, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->funcionario = $funcionario;
        $this->validator = $validator;
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Funcionários';
        $empresaUserAtual = Auth::user()->id_empresa;
        $funcionarios = $this->funcionario->getFuncionario($empresaUserAtual);        
        return view('imobweb.funcionario.index', compact('titulo', 'funcionarios'));
    }

    public function getCadastraFuncionario(){

        $titulo = 'ImobWeb - Cadastro de Funcionário';
        $cargos = Cargo::all();
        $empresaUserAtual = Auth::user()->id_empresa;
        $empresa = Empresa::all()->find($empresaUserAtual);
        $users = $this->funcionario->getUser($empresaUserAtual);

        return view('imobweb.funcionario.cadastra-funcionario', compact('titulo', 'cargos', 'users', 'empresa'));
    }

    public function postCadastraFuncionario(){

        $dadosForm = $this->request->all();
        $this->funcionario->create($dadosForm);

        return redirect('/dashboard/funcionarios')->with('status', 'Funcionário Cadastrado com Sucesso!');
    }

    public function getEditaFuncionario($id){

        $funcionario = $this->funcionario->all()->find($id);        
        dd($funcionario);
        $titulo = 'ImobWeb - Edição de Funcionário';
        $cargos = Cargo::all();
        $empresaUserAtual = Auth::user()->id_empresa;
        $empresa = Empresa::all()->find($empresaUserAtual);
        $users = $this->funcionario->getUser($empresaUserAtual);

        return view('imobweb.funcionario.edita-funcionario', compact('titulo', 'cargos', 'users', 'empresa', 'funcionario'));
    }

    public function getDemiteFuncionario($id){        

        $this->funcionario->find($id)->delete();
        
        return 1;
    }

    /*
    * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
    */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }
}
