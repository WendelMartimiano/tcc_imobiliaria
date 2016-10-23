<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Imovel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;

class ImovelController extends Controller
{
    private $request;
    private $imovel;
    private $validator;

    public function __construct(Request $request, Imovel $imovel, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->imovel = $imovel;
        $this->validator = $validator;
    }

    public function getIndex(){
        $titulo = 'ImobWeb - Imoveis';

        return view('imobweb.imovel.index', compact('titulo'));
    }

    public function getCadastraImovel(){
        $titulo = 'ImobWeb - Cadastro de Imóvel';

        return view('imobweb.imovel.cadastra-imovel', compact('titulo'));
    }
}
