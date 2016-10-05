<?php

namespace App\Http\Controllers\ImobWeb;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Home';

        return view('imobweb.home.index', compact('titulo'));
    }

   /*
    * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
    */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }

}
