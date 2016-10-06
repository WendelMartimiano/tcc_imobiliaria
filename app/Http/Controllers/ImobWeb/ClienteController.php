<?php

namespace App\Http\Controllers\ImobWeb;

use App\Models\Cliente;
use App\Models\TipoCliente;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;

class ClienteController extends Controller
{
    private $request;
    private $cliente;
    private $validator;

    public function __construct(Request $request, Cliente $cliente, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->cliente = $cliente;
        $this->validator = $validator;
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Clientes';
        $empresaUserAtual = Auth::user()->id_empresa;
        $clientes = $this->cliente->getCliente($empresaUserAtual);

        if(count($clientes) == 0){
            $tituloTabela = 'Resultados da Pesquisa: Nenhum registro encontrado!';
        }

        return view('imobweb.cliente.index', compact('titulo', 'clientes', 'tituloTabela'));
    }

    public function getCadastraCliente(){

        $titulo = 'ImobWeb - Cadastro de Cliente';
        $tiposClientes = TipoCliente::all();

        return view('imobweb.cliente.cadastra-cliente', compact('titulo', 'tiposClientes'));
    }

    public function postCadastraCliente(){
        $dadosForm = $this->request->all();
        
        $valida_requiredPessoaF = $this->validator->make($dadosForm, Cliente::$rules_requiredPessoaF);
        $valida_requiredPessoaJ = $this->validator->make($dadosForm, Cliente::$rules_requiredPessoaJ);
        $valida_cnpj = $this->validator->make($dadosForm, Cliente::$rules_cnpj);
        $valida_cpf = $this->validator->make($dadosForm, Cliente::$rules_cpf);
        $valida_size = $this->validator->make($dadosForm, Cliente::$rules_size);
        $valida_type = $this->validator->make($dadosForm, Cliente::$rules_type);
        $valida_duplicatedCpfCnpj = $this->validator->make($dadosForm, Cliente::$rules_duplicatedCpfCnpj);
        $valida_duplicatedRG = $this->validator->make($dadosForm, Cliente::$rules_duplicatedRG);

        //válida os campos obrigatórios tipo pessoa fisíca
        if ($dadosForm["tipo_pessoa"] == "F"){
            if ($valida_requiredPessoaF->fails()) {
                $messages = $valida_requiredPessoaF->messages();

                if ($messages->all()) {
                    $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
                }

                return $displayErrors;
            };
        };

        //válida os campos obrigatórios tipo pessoa jurídica
        if ($dadosForm["tipo_pessoa"] == "J"){
            if ($valida_requiredPessoaJ->fails()) {
                $messages = $valida_requiredPessoaJ->messages();

                if ($messages->all()) {
                    $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
                }

                return $displayErrors;
            };
        };

        //válida o cpf
        if ($dadosForm["tipo_pessoa"] == "F"){
            if ($valida_cpf->fails()) {
                $messages = $valida_cpf->messages();

                if ($messages->all()) {
                    $displayErrors = array("CPF inválido! Verifique.");
                }

                return $displayErrors;
            };
        };

        //válida o cnpj
        if ($dadosForm["tipo_pessoa"] == "J"){
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

        //válida os cpf ou cnpj duplicados
        if ($valida_duplicatedCpfCnpj->fails()) {
            $messages = $valida_duplicatedCpfCnpj->messages();

            if ($messages->all()) {
                $displayErrors = array("CPF ou CNPJ já cadastrado no sistema! Verifique.");
            }

            return $displayErrors;
        };

        //válida os rg duplicados
        if ($valida_duplicatedRG->fails()) {
            $messages = $valida_duplicatedRG->messages();

            if ($messages->all()) {
                $displayErrors = array("RG já cadastrado no sistema! Verifique.");
            }

            return $displayErrors;
        };

        $this->cliente->create($dadosForm);
        return 1;
    }

    public function getEditaCliente($id){

        $cliente = $this->cliente->all()->find($id);
        $titulo = 'ImobWeb - Edição de Cliente';
        $tiposClientes = TipoCliente::all();

        return view('imobweb.cliente.edita-cliente', compact('titulo', 'cliente', 'tiposClientes'));
    }

    public function postEditaCliente($id){

        $cliente = $this->cliente->all()->find($id);
        $dadosForm = $this->request->all();

        $valida_requiredPessoaF = $this->validator->make($dadosForm, Cliente::$rules_requiredPessoaF);
        $valida_requiredPessoaJ = $this->validator->make($dadosForm, Cliente::$rules_requiredPessoaJ);
        $valida_cnpj = $this->validator->make($dadosForm, Cliente::$rules_cnpj);
        $valida_cpf = $this->validator->make($dadosForm, Cliente::$rules_cpf);
        $valida_size = $this->validator->make($dadosForm, Cliente::$rules_size);
        $valida_type = $this->validator->make($dadosForm, Cliente::$rules_type);

        //válida os campos obrigatórios tipo pessoa fisíca
        if ($dadosForm["tipo_pessoa"] == "F"){
            if ($valida_requiredPessoaF->fails()) {
                $messages = $valida_requiredPessoaF->messages();

                if ($messages->all()) {
                    $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
                }

                return $displayErrors;
            };
        };

        //válida os campos obrigatórios tipo pessoa jurídica
        if ($dadosForm["tipo_pessoa"] == "J"){
            if ($valida_requiredPessoaJ->fails()) {
                $messages = $valida_requiredPessoaJ->messages();

                if ($messages->all()) {
                    $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
                }

                return $displayErrors;
            };
        };

        //válida o cpf
        if ($dadosForm["tipo_pessoa"] == "F"){
            if ($valida_cpf->fails()) {
                $messages = $valida_cpf->messages();

                if ($messages->all()) {
                    $displayErrors = array("CPF inválido! Verifique.");
                }

                return $displayErrors;
            };
        };

        //válida o cnpj
        if ($dadosForm["tipo_pessoa"] == "J"){
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
        
        $cliente->fill($dadosForm);
        $cliente->save();

        return 1;
    }

    public function getDeletaCliente($id){
        $this->cliente->find($id)->delete();
        return 1;
    }

    public function postPesquisar(){
       $dadosForm = $this->request->all(); 
       
       $clientes = $this->cliente->getResultadoPesquisa($dadosForm);

       if(count($clientes) == 0){
            $tituloTabela = 'Nenhum registro encontrado!';
       }else{
           $tituloTabela = 'Resultados da Pesquisa:';
       }
        
        $titulo = 'ImobWeb - Clientes';              
        return view('imobweb.cliente.index', compact('titulo', 'clientes', 'tituloTabela'));
    }
    
}
