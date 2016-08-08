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
     * VÁLIDA COM AS REGRAS DA MODEL E EFETUA O CADASTRO DA EMPRESA,
     * RETORNANDO AS DEVIDAS MENSAGENS.
     */
    public function postAdicionarEmpresa() {
        //recebe dados do formulário na view
        $dadosForm = $this->request->all();

        //válida os dados referente as regras na model
        $valida_required = $this->validator->make($dadosForm, Empresa::$rules_required);
        $valida_cnpj = $this->validator->make($dadosForm, Empresa::$rules_cnpj);
        $valida_size = $this->validator->make($dadosForm, Empresa::$rules_size);
        $valida_type = $this->validator->make($dadosForm, Empresa::$rules_type);

        //válida os campos obrigatórios
        if($valida_required->fails()){
            $messages = $valida_required->messages();

            /*
            foreach($messages->all("<p>:message<i class='material-icons right'>warning</i></p>") as $error){
                array_push($displayErrors, $error);
            }
            */

            if($messages->all()){
                $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!<i class='material-icons right'>warning</i>");
            }

            return $displayErrors;
        };

        //válida o cnpj
        if($valida_cnpj->fails()){
            $messages = $valida_cnpj->messages();

            if($messages->all()){
                $displayErrors = array("Cnpj inválido! Verifique.<i class='material-icons right'>warning</i>");
            }

            return $displayErrors;
        };

        //válida a quantidade mínima de caracteres por campo
        if($valida_size->fails()){
            $messages = $valida_size->messages();

            $displayErrors = array();

            foreach($messages->all("<p>:message<i class='material-icons right'>warning</i></p>") as $error){
                array_push($displayErrors, $error);
            }

            return $displayErrors;
        };

        //válida os tipos dos campos
        if($valida_type->fails()){
            $messages = $valida_type->messages();

            $displayErrors = array();

            foreach($messages->all("<p>:message<i class='material-icons right'>warning</i></p>") as $error){
                array_push($displayErrors, $error);
            }

            return $displayErrors;
        };

        //efetua o cadastro da empresa
        $this->empresa->create($dadosForm);

        return 1;
    }
}
