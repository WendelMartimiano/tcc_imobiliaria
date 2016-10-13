<?php

namespace App\Http\Controllers\ImobWeb;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

        return view('imobweb.contrato.contrato-venda', compact('titulo'));
    }
}
