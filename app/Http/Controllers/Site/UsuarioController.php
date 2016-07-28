<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function getIndex(){
        $titulo = 'Cadastro de Usuário';

        return view('site.cadastra_usuario', compact('titulo'));
    }
}
