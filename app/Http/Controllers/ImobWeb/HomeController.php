<?php

namespace App\Http\Controllers\ImobWeb;

use App\Http\Middleware\Authenticate;
use App\Models\Funcionario;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Empresa;

class HomeController extends Controller
{

    private $empresa;
    private $imovel;
    private $funcionario;

    public function __construct(Empresa $empresa, Imovel $imovel, Funcionario $funcionario)
    {
        $this->middleware('auth');
        $this->empresa = $empresa;
        $this->imovel = $imovel;
        $this->funcionario = $funcionario;
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Home';

        $empresaUserAtual = Auth::user()->id_empresa;

        $imobiliaria = $this->empresa->all()->find($empresaUserAtual);
        $disponiveis = count($this->imovel->getDisponiveis($empresaUserAtual));
        $reservados = count($this->imovel->getReservados($empresaUserAtual));
        $vendidos = count($this->imovel->getVendidos($empresaUserAtual));
        $funcionarios = count($this->funcionario->getTotalFuncionario($empresaUserAtual));
        return view('imobweb.home.index', compact('titulo', 'imobiliaria', 'disponiveis', 'reservados', 'vendidos', 'funcionarios'));
    }

   /*
    * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
    */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }

}
