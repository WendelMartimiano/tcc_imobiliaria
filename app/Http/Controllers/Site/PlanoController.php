<?php

namespace App\Http\Controllers\Site;

use App\Models\OpcoesMenu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Plano;
use Mail;
use Illuminate\Validation\Factory;

class PlanoController extends Controller
{

    private $request;
    private $plano;
    private $opcoes;
    private $validator;

    public function __construct(Request $request, Plano $plano, OpcoesMenu $opcoes, Factory $validator)
    {
        $this->request = $request;
        $this->plano = $plano;
        $this->opcoes = $opcoes;
        $this->validator = $validator;
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
     * ENVIO DE E-MAIL DE CONTATO DO SITE.
     */
    public function postMailContato(){
        $dadosForm = $this->request->all();

        $rules = [
            'nome' => 'required|min:6',
            'email' => 'required|email',
            'mensagem' => 'required|min:10'
        ];

        $validator = $this->validator->make($dadosForm, $rules);

        if($validator->fails()){
            $messages = $validator->messages();

            $displayErrors = '';

            foreach ($messages->all("<p><strong>:message</strong></p>") as $error){
                $displayErrors .= $error;
            }

            return $displayErrors;
        };

        Mail::send('site.emails.contato', $dadosForm, function ($m){
            $m->to('wendelprogrammer@gmail.com')
                ->subject('Mensagem de teste do site.');
        });

        return 1;
    }


    /*
     * CASO A URL ESTEJA INCORRETA, RETORNA ERRO 404.
     */
    public function missingMethod($parameters = [])
    {
        return view('errors.404');
    }


}
