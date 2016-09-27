<?php

namespace App\Http\Controllers\ImobWeb;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
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
        
    }
}
