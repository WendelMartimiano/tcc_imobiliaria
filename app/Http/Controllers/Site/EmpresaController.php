<?php

namespace App\Http\Controllers\Site;

use App\Models\Empresa;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Plano;
use Illuminate\Validation\Factory;

class EmpresaController extends Controller
{
    private $request;
    private $empresa;
    private $validator;

    public function __construct(Request $request, Empresa $empresa, Factory $validator) {
        $this->request = $request;
        $this->empresa = $empresa;
        $this->validator = $validator;
    }

    /*
     * REDIRECIONA PARA O CADASTRO DE EMPRESAS COM O PLANO($param) ESCOLHIDO NO SITE.
     */
    public function getIndex($param) {
        $titulo = 'Cadastro de Empresa';
        $plano = Plano::all()->find($param);

        return view('site.empresa', compact('titulo', 'plano'));
    }

    /*
     * VALIDA COM AS REGRAS DA MODEL E EFETUA O CADASTRO DA EMPRESA,
     * RETORNANDO AS DEVIDAS MENSAGENS.
     */
    public function postAdicionarEmpresa() {
        //recebe dados do formulário na view
        $dadosForm = $this->request->all();

        //valida os dados referente as regras na model
        $validator = $this->validator->make($dadosForm, Empresa::$rules);
        $valida_cnpj = $this->validator->make($dadosForm, Empresa::$rules_cnpj);

        //valida os dados obrigatórios e retorna as mensagens
        if($validator->fails()){
            $messages = $validator->messages();

            $displayErrors = '';


            foreach($messages->all("<p>:message</p>") as $error){
                $displayErrors .= $error;
            }

            /*
            if($messages->all()){
                $displayErrors = "É necessário informar todos os campos com ' * ' para prosseguir!";
            }
            */

            return $displayErrors;
        };

        //valida se o cnpj é válido
        if($valida_cnpj->fails()){
            $messages = $valida_cnpj->messages();

            $displayErrors = '';


            if($messages->all()){
                $displayErrors = "Cnpj inválido! Verifique.";
            }


            return $displayErrors;
        };

        //efetua o cadastro da empresa
        $this->empresa->create($dadosForm);

        return 1;
    }
}
