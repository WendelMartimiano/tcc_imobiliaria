<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Cargo;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Imovel;
use App\Models\TipoCliente;
use App\Models\TipoImovel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use PDF;

class RelatorioController extends Controller
{

    private $request;
    private $imovel;
    private $funcionario;
    private $cliente;

    public function __construct(Request $request, Imovel $imovel, Funcionario $funcionario, Cliente $cliente){
        $this->middleware('auth');
        $this->request = $request;
        $this->imovel = $imovel;
        $this->funcionario = $funcionario;
        $this->cliente = $cliente;
    }

    public function getIndex()
    {
        $titulo = 'ImobWeb - Relatórios';

        return view('imobweb.relatorio.index', compact('titulo'));
    }

    public function getRelatorioImovel(){
        $titulo = 'ImobWeb - Relatório de Imóvel';
        $tiposImovel = TipoImovel::all();

        return view('imobweb.relatorio.relatorio-imovel', compact('titulo', 'tiposImovel'));
    }

    public function getRelatorioFuncionario(){
        $titulo = 'ImobWeb - Relatório de Funcionário';
        $cargos = Cargo::all();

        return view('imobweb.relatorio.relatorio-funcionario', compact('titulo', 'cargos'));
    }

    public function getRelatorioCliente(){
        $titulo = 'ImobWeb - Relatório de Cliente';
        $tipos = TipoCliente::all();

        return view('imobweb.relatorio.relatorio-cliente', compact('titulo', 'tipos'));
    }

    public function postGeraRelatorioImovel(){
        $dadosForm = $this->request->all();
        $empresaUserAtual = Auth::user()->id_empresa;

        $imovel = $this->imovel->getDadosRelatorio($dadosForm, $empresaUserAtual);

        return PDF::loadView('imobweb.relatorio.relatorio-imovel-pdf', ['imoveis'=> $imovel])->download('relatório-imóvel.pdf');
    }

    public function postGeraRelatorioFuncionario(){
        $dadosForm = $this->request->all();
        $empresaUserAtual = Auth::user()->id_empresa;

        $funcionario = $this->funcionario->getDadosRelatorio($dadosForm, $empresaUserAtual);
        //dd($funcionario);
        return PDF::loadView('imobweb.relatorio.relatorio-funcionario-pdf', ['funcionarios'=> $funcionario])->download('relatório-funcionário.pdf');
    }

    public function postGeraRelatorioCliente(){
        $dadosForm = $this->request->all();
        $empresaUserAtual = Auth::user()->id_empresa;

        $cliente = $this->cliente->getDadosRelatorio($dadosForm, $empresaUserAtual);

        return PDF::loadView('imobweb.relatorio.relatorio-cliente-pdf', ['clientes'=> $cliente])->download('relatório-cliente.pdf');
    }
}
