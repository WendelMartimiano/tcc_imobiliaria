<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Imovel;
use App\Models\TipoImovel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
use Auth;
use DB;

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
        $empresaUserAtual = Auth::user()->id_empresa;
        $imoveis = $this->imovel->getImovel($empresaUserAtual);
        $tiposImoveis = TipoImovel::orderBy('descricao')->get();

        if(count($imoveis) == 0){
            $tituloTabela = 'Resultados da Pesquisa: Nenhum registro encontrado!';
        }

        return view('imobweb.imovel.index', compact('titulo', 'imoveis', 'tituloTabela', 'tiposImoveis'));
    }

    public function getCadastraImovel(){
        $titulo = 'ImobWeb - Cadastro de Imóvel';
        $tiposImoveis = TipoImovel::orderBy('descricao')->get();

        return view('imobweb.imovel.cadastra-imovel', compact('titulo', 'tiposImoveis'));
    }

    public function postCadastraImovel(){
        $dadosForm = $this->request->all();

        $valida_required = $this->validator->make($dadosForm, Imovel::$rules_required);
        $valida_cnpj = $this->validator->make($dadosForm, Imovel::$rules_cnpj);
        $valida_cpf = $this->validator->make($dadosForm, Imovel::$rules_cpf);
        $valida_size = $this->validator->make($dadosForm, Imovel::$rules_size);
        $valida_type = $this->validator->make($dadosForm, Imovel::$rules_type);
        $valida_duplicatedCode = $this->validator->make($dadosForm, Imovel::$rules_duplicatedCode);


        //valida os campos obrigatórios
        if ($valida_required->fails()) {
            $messages = $valida_required->messages();

            if ($messages->all()) {
                $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
            }

            return $displayErrors;
        };

        //válida o cpf
        if (strlen($dadosForm["cpf_cnpj"]) == 11){
            if ($valida_cpf->fails()) {
                $messages = $valida_cpf->messages();

                if ($messages->all()) {
                    $displayErrors = array("CPF inválido! Verifique.");
                }

                return $displayErrors;
            };
        };

        //válida o cnpj
        if (strlen($dadosForm["cpf_cnpj"]) == 14){
            if ($valida_cnpj->fails()) {
                $messages = $valida_cnpj->messages();

                if ($messages->all()) {
                    $displayErrors = array("CNPJ inválido! Verifique.");
                }

                return $displayErrors;
            };
        };

        //válida a quantidade mínima de caracteres por campo
        if ($valida_size->fails()) {
            $messages = $valida_size->messages();

            $displayErrors = array();

            foreach ($messages->all(":message") as $error) {
                array_push($displayErrors, $error);
            }

            return $displayErrors;
        };

        //válida os tipos dos campos
        if ($valida_type->fails()) {
            $messages = $valida_type->messages();

            $displayErrors = array();

            foreach ($messages->all(":message") as $error) {
                array_push($displayErrors, $error);
            }

            return $displayErrors;
        };

        //válida os código duplicado
        if ($valida_duplicatedCode->fails()) {
            $messages = $valida_duplicatedCode->messages();

            if ($messages->all()) {
                $displayErrors = array("Código já cadastrado no sistema! Verifique.");
            }

            return $displayErrors;
        };

        $this->imovel->create($dadosForm);
        return 1;
    }

    public function getEditaImovel(){}

    public function postEditaImovel(){}

    public function getDeletaImovel($id){
        $this->imovel->find($id)->delete();
        return 1;
    }
}
