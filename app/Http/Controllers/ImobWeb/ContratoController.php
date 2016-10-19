<?php

namespace App\Http\Controllers\ImobWeb;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;

class ContratoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function getIndex(){
        $titulo = 'ImobWeb - Contratos';

        return view('imobweb.contrato.index', compact('titulo'));
    }

    public function getContratoVenda(){
        $titulo = 'ImobWeb - Contrato de Venda';

        return view('imobweb.contrato.contrato-venda', compact('titulo'));
    }

    public function getContratoReserva(){
        $titulo = 'ImobWeb - Contrato de Reserva';

        return view('imobweb.contrato.contrato-reserva', compact('titulo'));
    }

    public function getContratoVendaPdf(){
        return PDF::loadView('imobweb.contrato.contrato-venda-pdf')->download('contrato-venda.pdf');
    }

    public function getContratoReservaPdf(){
        return PDF::loadView('imobweb.contrato.contrato-reserva-pdf')->download('contrato-reserva.pdf');
    }
}
