<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Imovel;
use App\Models\TipoContrato;
use App\Models\Venda;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
use Auth;
use PDF;

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
        $vendas = $this->venda->getVenda($empresaUserAtual);

        if(count($vendas) == 0){
            $tituloTabela = 'Resultados da Pesquisa: Nenhum registro encontrado!';
        }

        return view('imobweb.venda.index', compact('titulo', 'vendas', 'tituloTabela'));
    }

    public function getCadastraVenda(){
        $titulo = 'ImobWeb - Cadastro de Venda';
        $empresaUserAtual = Auth::user()->id_empresa;

        $compradores = $this->venda->getComprador($empresaUserAtual);
        $vendedores = $this->venda->getVendedor($empresaUserAtual);
        $corretores = $this->venda->getCorretor($empresaUserAtual);
        $imoveis = $this->venda->getImovel($empresaUserAtual);
        $contrato = TipoContrato::find(2);

        return view('imobweb.venda.cadastra-venda', compact('titulo', 'compradores', 'vendedores', 'corretores', 'imoveis', 'contrato'));
    }

    public function postCadastraVenda(){
        $dadosForm = $this->request->all();

        /*$valida_required = $this->validator->make($dadosForm, Venda::$rules_required);
        if ($valida_required->fails()) {
            $messages = $valida_required->messages();

            if ($messages->all()) {
                $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
            }

            return $displayErrors;
        };*/

        $this->venda->create($dadosForm);
        $empresaUserAtual = Auth::user()->id_empresa;
        $imovel = Imovel::find($dadosForm['id_imovel']);

        $imovel->fill(['status' => 'VENDIDO']);
        $imovel->save();

        $imobiliaria = $this->venda->getDadosImobiliaria($empresaUserAtual);
        $vendedor = $this->venda->getDadosCliente($dadosForm['vendedor']);
        $comprador = $this->venda->getDadosCliente($dadosForm['comprador']);
        $corretor = $this->venda->getDadosCorretor($dadosForm['corretor']);
        $imoveis = $this->venda->getDadosImovel($dadosForm['id_imovel']);

        return PDF::loadView('imobweb.venda.contrato-venda-pdf', ['imobiliarias'=> $imobiliaria, 'vendedores'=> $vendedor, 'compradores'=> $comprador, 'corretores'=> $corretor, 'imoveis'=> $imoveis])->download('contrato-venda.pdf');
    }

    public function getCancelaVenda($id){
        $venda = $this->venda->all()->find($id);
        $imovel = Imovel::find($venda->id_imovel);

        $imovel->fill(['status' => NULL]);
        $imovel->save();

        $venda->delete();
        return 1;
    }

    public function getImprimeContrato($id){
        $venda = $this->venda->all()->find($id);
        $empresaUserAtual = Auth::user()->id_empresa;

        $imobiliaria = $this->venda->getDadosImobiliaria($empresaUserAtual);
        $vendedor = $this->venda->getDadosCliente($venda->vendedor);
        $comprador = $this->venda->getDadosCliente($venda->comprador);
        $corretor = $this->venda->getDadosCorretor($venda->corretor);
        $imoveis = $this->venda->getDadosImovel($venda->id_imovel);

        return PDF::loadView('imobweb.venda.contrato-venda-pdf', ['imobiliarias'=> $imobiliaria, 'vendedores'=> $vendedor, 'compradores'=> $comprador, 'corretores'=> $corretor, 'imoveis'=> $imoveis])->download('contrato-venda.pdf');
    }

    public function postPesquisar(){
        $dadosForm = $this->request->all();
        $empresaUserAtual = Auth::user()->id_empresa;
        $vendas = $this->venda->getResultadoPesquisa($dadosForm, $empresaUserAtual);

        if(count($vendas) == 0){
            $tituloTabela = 'Nenhum registro encontrado!';
        }else{
            $tituloTabela = 'Resultados da pesquisa:';
        }

        $titulo = 'ImobWeb - Vendas';
        return view('imobweb.venda.index', compact('titulo', 'vendas', 'tituloTabela'));
    }
}
