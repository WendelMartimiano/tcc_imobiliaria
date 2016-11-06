<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Reserva;
use App\Models\Imovel;
use App\Models\TipoContrato;
use App\Models\Venda;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
use Auth;
use PDF;

class ReservaController extends Controller
{

    private $request;
    private $reserva;
    private $validator;

    public function __construct(Request $request, Reserva $reserva, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->reserva = $reserva;
        $this->validator = $validator;
    }

    public function getIndex(){
        $titulo = 'ImobWeb - Reservas';
        $empresaUserAtual = Auth::user()->id_empresa;
        $reservas = $this->reserva->getReserva($empresaUserAtual);
        //dd($reservas);
        if(count($reservas) == 0){
            $tituloTabela = 'Resultados da Pesquisa: Nenhum registro encontrado!';
        }

        return view('imobweb.reserva.index', compact('titulo', 'reservas', 'tituloTabela'));
    }

    public function getCadastraReserva(){
        $titulo = 'ImobWeb - Cadastro de Reserva';
        $empresaUserAtual = Auth::user()->id_empresa;

        $compradores = $this->reserva->getComprador($empresaUserAtual);
        $vendedores = $this->reserva->getVendedor($empresaUserAtual);
        $corretores = $this->reserva->getCorretor($empresaUserAtual);
        $imoveis = $this->reserva->getImovel($empresaUserAtual);
        $contrato = TipoContrato::find(1);

        return view('imobweb.reserva.cadastra-reserva', compact('titulo', 'compradores', 'vendedores', 'corretores', 'imoveis', 'contrato'));
    }

    public function postCadastraReserva(){
        $dadosForm = $this->request->all();

        $this->reserva->create($dadosForm);
        $empresaUserAtual = Auth::user()->id_empresa;
        $imovel = Imovel::find($dadosForm['id_imovel']);

        $imovel->fill(['status' => 'RESERVADO']);
        $imovel->save();

        $imobiliaria = $this->reserva->getDadosImobiliaria($empresaUserAtual);
        $vendedor = $this->reserva->getDadosCliente($dadosForm['vendedor']);
        $comprador = $this->reserva->getDadosCliente($dadosForm['comprador']);
        $corretor = $this->reserva->getDadosCorretor($dadosForm['corretor']);
        $imoveis = $this->reserva->getDadosImovel($dadosForm['id_imovel']);

        return PDF::loadView('imobweb.reserva.contrato-reserva-pdf', ['imobiliarias'=> $imobiliaria, 'vendedores'=> $vendedor, 'compradores'=> $comprador, 'corretores'=> $corretor, 'imoveis'=> $imoveis])->download('contrato-reserva.pdf');
    }

    public function getCancelaReserva($id){
        $reserva = $this->reserva->all()->find($id);
        $imovel = Imovel::find($reserva->id_imovel);

        $imovel->fill(['status' => NULL]);
        $imovel->save();

        $reserva->delete();
        return 1;
    }

    public function getImprimeContrato($id){
        $reserva = $this->reserva->all()->find($id);
        $empresaUserAtual = Auth::user()->id_empresa;

        $imobiliaria = $this->reserva->getDadosImobiliaria($empresaUserAtual);
        $vendedor = $this->reserva->getDadosCliente($reserva->vendedor);
        $comprador = $this->reserva->getDadosCliente($reserva->comprador);
        $corretor = $this->reserva->getDadosCorretor($reserva->corretor);
        $imoveis = $this->reserva->getDadosImovel($reserva->id_imovel);

        return PDF::loadView('imobweb.reserva.contrato-reserva-pdf', ['imobiliarias'=> $imobiliaria, 'vendedores'=> $vendedor, 'compradores'=> $comprador, 'corretores'=> $corretor, 'imoveis'=> $imoveis])->download('contrato-reserva.pdf');
    }

    public function postPesquisar(){
        $dadosForm = $this->request->all();
        $empresaUserAtual = Auth::user()->id_empresa;
        $reservas = $this->reserva->getResultadoPesquisa($dadosForm, $empresaUserAtual);

        if(count($reservas) == 0){
            $tituloTabela = 'Nenhum registro encontrado!';
        }else{
            $tituloTabela = 'Resultados da pesquisa:';
        }

        $titulo = 'ImobWeb - Reservas';
        return view('imobweb.reserva.index', compact('titulo', 'reservas', 'tituloTabela'));
    }

    public function getGeraVenda($id){
        $reserva = $this->reserva->all()->find($id);
        $imovel = Imovel::find($reserva->id_imovel);

        $imovel->fill(['status' => 'VENDIDO']);
        $imovel->save();

        $venda = new Venda();
        $venda->comprador = $reserva->comprador;
        $venda->vendedor = $reserva->vendedor;
        $venda->corretor = $reserva->corretor;
        $venda->id_imovel = $reserva->id_imovel;
        $venda->id_tipo_contrato = 2;
        $venda->id_empresa = $reserva->id_empresa;
        $venda->save();

        $reserva->delete();

        return 1;
    }
}
