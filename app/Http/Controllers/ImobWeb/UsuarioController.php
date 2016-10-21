<?php

namespace App\Http\Controllers\ImobWeb;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
use Crypt;
use DB;
use Auth;

class UsuarioController extends Controller
{
    private $totalItensPorPagina = 1;

    private $request;
    private $usuario;
    private $validator;

    public function __construct(Request $request, User $usuario, Factory $validator)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->usuario = $usuario;
        $this->validator = $validator;
    }

    public function getIndex(){

        $titulo = 'ImobWeb - Usuários';
        $empresaUserAtual = Auth::user()->id_empresa;
        $usuarios = $this->usuario->getUser($empresaUserAtual);

        if(count($usuarios) == 0){
            $tituloTabela = 'Resultados da Pesquisa: Nenhum registro encontrado!';
        }

        return view('imobweb.usuario.index', compact('titulo', 'usuarios', 'tituloTabela'));
    }

    public function getCadastraUsuario(){

        $titulo = 'ImobWeb - Cadastro de Usuário';
        return view('imobweb.usuario.cadastra-usuario', compact('titulo'));
    }

    public function postCadastraUsuario(){
        $dadosForm = $this->request->all();

        //válida os dados referente as regras na model
        $valida_required = $this->validator->make($dadosForm, User::$rules_required);
        $valida_size = $this->validator->make($dadosForm, User::$rules_size);
        $valida_type = $this->validator->make($dadosForm, User::$rules_type);
        $valida_duplicated = $this->validator->make($dadosForm, User::$rules_duplicated);
        $valida_confirmation = $this->validator->make($dadosForm, User::$rules_confirmation);

        //válida os campos obrigatórios
        if ($valida_required->fails()) {
            $messages = $valida_required->messages();

            if ($messages->all()) {
                $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
            }

            return $displayErrors;
        };

        //válida a quantidade mínima de caracteres por campo
        if ($valida_size->fails()) {
            $messages = $valida_size->messages();

            if ($messages->all()) {
                $displayErrors = array("A senha deve ter no mínimo 6 caracteres!");
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


        //válida os registros duplicados
        if ($valida_duplicated->fails()) {
            $messages = $valida_duplicated->messages();

            $displayErrors = array();

            foreach ($messages->all(":message") as $error) {
                array_push($displayErrors, $error);
            }

            return $displayErrors;
        };

        //válida confirmação de senha
        if ($valida_confirmation->fails()) {
            $messages = $valida_confirmation->messages();

            if ($messages->all()) {
                $displayErrors = array("A confirmação da senha não confere!");
            }

            return $displayErrors;
        };

        //efetua o cadastro do usuário criptografando a senha
        User::create([
            'name' => $dadosForm['name'],
            'email' => $dadosForm['email'],
            'password' => bcrypt($dadosForm['password']),
            'id_empresa' => $dadosForm['id_empresa']
        ]);

        return 1;
    }

    public function getEditaUsuario($id){
        $titulo = 'ImobWeb - Edição de Usuário';
        $usuario = $this->usuario->all()->find($id);

        return view('imobweb.usuario.edita-usuario', compact('titulo', 'usuario'));
    }

    public function postEditaUsuario($id){
        $usuario = $this->usuario->all()->find($id);
        $dadosForm = $this->request->all();

        $rules_duplicated = [
            'email'                     =>'unique:users,email,'.$id
        ];

        //válida os dados referente as regras na model
        $valida_required = $this->validator->make($dadosForm, User::$rules_required);
        $valida_size = $this->validator->make($dadosForm, User::$rules_size);
        $valida_type = $this->validator->make($dadosForm, User::$rules_type);
        $valida_confirmation = $this->validator->make($dadosForm, User::$rules_confirmation);
        $valida_duplicated = $this->validator->make($dadosForm, $rules_duplicated);

        //válida os campos obrigatórios
        if ($valida_required->fails()) {
            $messages = $valida_required->messages();

            if ($messages->all()) {
                $displayErrors = array("É necessário informar todos os campos com ' * ' para prosseguir!");
            }

            return $displayErrors;
        };

        //válida a quantidade mínima de caracteres por campo
        if ($valida_size->fails()) {
            $messages = $valida_size->messages();

            if ($messages->all()) {
                $displayErrors = array("A senha deve ter no mínimo 6 caracteres!");
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

        //válida confirmação de senha
        if ($valida_confirmation->fails()) {
            $messages = $valida_confirmation->messages();

            if ($messages->all()) {
                $displayErrors = array("A confirmação da senha não confere!");
            }

            return $displayErrors;
        };

        //valida registros duplicados em uma atualização
        if ($valida_duplicated->fails()) {
            $messages = $valida_duplicated->messages();

            $displayErrors = array();

            foreach ($messages->all(":message") as $error) {
                array_push($displayErrors, $error);
            }

            return $displayErrors;
        };

        $usuario->fill([
            'name' => $dadosForm['name'],
            'email' => $dadosForm['email'],
            'password' => bcrypt($dadosForm['password']),
            'id_empresa' => $dadosForm['id_empresa']
        ]);
        $usuario->save();

        return 1;
    }

    public function getDeletaUsuario($id){
        $this->usuario->find($id)->delete();
        return 1;
    }

    public function postPesquisar(){
        $dadosForm = $this->request->all();
        
        $usuarios = $this->usuario->getResultadoPesquisa($dadosForm);

        if(count($usuarios) == 0){
            $tituloTabela = 'Nenhum registro encontrado!';
        }else{
            $tituloTabela = 'Resultados da pesquisa:';
        }

        $titulo = 'ImobWeb - Usuários';
        return view('imobweb.usuario.index', compact('titulo', 'usuarios', 'tituloTabela'));
    }
}
