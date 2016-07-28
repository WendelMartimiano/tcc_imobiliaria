<?php

namespace App\Http\Controllers\Site;

use App\Models\OpcoesMenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Plano;

class PlanoController extends Controller
{

    private $request;
    private $plano;
    private $opcoes;

    public function __construct(Request $request, Plano $plano, OpcoesMenu $opcoes)
    {
        $this->request = $request;
        $this->plano = $plano;
        $this->opcoes = $opcoes;
    }

    /*
     * PREENCHE DINAMICAMENTE OS PLANOS E SUAS OPÇÕES NO SITE.
     */
    public function getIndex(){
        
        $free = 1;
        $basico = 2;
        $completo = 3;

        $planos = $this->plano->all();
        $opcoes = $this->opcoes->all();
        $cor = " ";
        $icone = ' ';


        $opcoesfree = $this->plano->getOpcoesPlanos($free);
        $opcoesbasico = $this->plano->getOpcoesPlanos($basico);
        $opcoescompleto = $this->plano->getOpcoesPlanos($completo);
        //dd($opcoesfree);
        return view('site.index', compact('planos', 'opcoes', 'cor', 'icone', 'opcoesfree', 'opcoesbasico', 'opcoescompleto'));
    }

    /*
     * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
     */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }


}
