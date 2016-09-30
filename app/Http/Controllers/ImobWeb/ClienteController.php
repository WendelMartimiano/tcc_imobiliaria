<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;

class ClienteController extends Controller
{
    private $request;
    private $cliente;
    private $validator;

    public function __construct(Request $request, Cliente $cliente, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->cliente = $cliente;
        $this->validator = $validator;
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Clientes';
        $empresaUserAtual = Auth::user()->id_empresa;
        $clientes = $this->cliente->getCliente($empresaUserAtual);

        if(count($clientes) == 0){
            $tituloTabela = 'Resultados da Pesquisa: Nenhum registro encontrado!';
        }

        return view('imobweb.cliente.index', compact('titulo', 'clientes', 'tituloTabela'));
    }

    public function getCadastraCliente(){

        $titulo = 'ImobWeb - Cadastro de Cliente';
        /*$cargos = Cargo::all();
        $empresaUserAtual = Auth::user()->id_empresa;
        $users = $this->funcionario->getUser($empresaUserAtual);*/

        return view('imobweb.cliente.cadastra-cliente', compact('titulo'));
    }
}
