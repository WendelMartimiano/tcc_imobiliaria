<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Cargo;
use Illuminate\Validation\Factory;

class UsuarioController extends Controller
{
    private $request;
    private $usuario;
    private $validator;

    public function __construct(Request $request, User $usuario, Factory $validator){
        $this->request = $request;
        $this->usuario = $usuario;
        $this->validator = $validator;
    }

    public function getIndex($param){
        //dd($param);
        $titulo = 'Cadastro de Usuário';
        $empresa = Empresa::all()->find($param);
        $cargos = Cargo::all();

        return view('site.cadastra_usuario', compact('titulo', 'empresa', 'cargos'));

    }

    public function postAdicionarUsuario(){
        $dadosForm = $this->request->all();
      //  $this->usuario->create($dadosForm);
        User::create([
            'name' => $dadosForm['name'],
            'email' => $dadosForm['email'],
            'password' => bcrypt($dadosForm['password']),
            'id_empresa' => $dadosForm['id_empresa'],
            'id_cargo' => $dadosForm['id_cargo']
        ]);

        return 1;
    }
}
