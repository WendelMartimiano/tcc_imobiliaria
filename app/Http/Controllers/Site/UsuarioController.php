<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Cargo;

class UsuarioController extends Controller
{
    public function getIndex($param){
        $titulo = 'Cadastro de Usuário';
        $empresa = Empresa::all()->find($param);
        $cargos = Cargo::lists('nome', 'id');
        //dd($cargos);
        return view('site.cadastra_usuario', compact('titulo', 'empresa', 'cargos'));

    }
}
