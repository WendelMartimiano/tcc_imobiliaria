<?php

namespace App\Http\Controllers\ImobWeb;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FuncionarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Funcionários';

        return view('imobweb.funcionarios', compact('titulo'));
    }

    public function getCadastraFuncionario(){

        $titulo = 'ImobWeb - Cadastro de Funcionário';

        return view('imobweb.cadastra-funcionario', compact('titulo'));
    }




    /*
    * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
    */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }
}
