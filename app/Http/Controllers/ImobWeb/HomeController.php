<?php

namespace App\Http\Controllers\ImobWeb;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Empresa;

class HomeController extends Controller
{

    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->middleware('auth');
        $this->empresa = $empresa;
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Home';

        $user = Auth::user()->id_empresa;

        $imobiliaria = $this->empresa->all()->find($user);

        return view('imobweb.home.index', compact('titulo', 'imobiliaria'));
    }

   /*
    * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
    */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }

}
