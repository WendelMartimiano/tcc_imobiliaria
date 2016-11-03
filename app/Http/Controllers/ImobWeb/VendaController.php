<?php

namespace App\Http\Controllers\ImobWeb;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendaController extends Controller
{

    public function getIndex(){
        $titulo = 'ImobWeb - Vendas';

        return view('imobweb.venda.index', compact('titulo'));
    }
}
