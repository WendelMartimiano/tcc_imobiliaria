<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\TipoContrato;
use App\Models\Venda;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
use Auth;

class VendaController extends Controller
{

    private $request;
    private $venda;
    private $validator;

    public function __construct(Request $request, Venda $venda, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->venda = $venda;
        $this->validator = $validator;
    }

    public function getIndex(){
        $titulo = 'ImobWeb - Vendas';
        $empresaUserAtual = Auth::user()->id_empresa;

        $clienteComprador = $this->venda->getClienteComprador($empresaUserAtual);
        $clienteVendedor = $this->venda->getClienteVendedor($empresaUserAtual);
        $corretores = $this->venda->getCorretor($empresaUserAtual);
        $imoveis = $this->venda->getImovel($empresaUserAtual);
        $contratos = TipoContrato::all();

        return view('imobweb.venda.index', compact('titulo', 'clienteComprador', 'clienteVendedor', 'corretores', 'imoveis', 'contratos'));
    }
}
