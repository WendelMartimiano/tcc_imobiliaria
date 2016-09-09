<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Empresa;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Plano;

class ImobiliariaController extends Controller
{
    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->middleware('auth');
        $this->empresa = $empresa;
    }

    public function getIndex(){

        //retorna o id da empresa do usuário autenticado
        $user = Auth::user()->id_empresa;

        //retorna os dados da empresa de acordo a empresa do usuário autenticado
        $imobiliaria = $this->empresa->all()->find($user);

        //retorna os dados do plano de acordo com a empresa do usuário autenticado
        $plano = Plano::all()->find($imobiliaria->id_plano);

        $titulo = 'ImobWeb - Imobiliaria';

        return view('imobweb.empresa.index', compact('titulo', 'imobiliaria', 'plano'));
    }

}
