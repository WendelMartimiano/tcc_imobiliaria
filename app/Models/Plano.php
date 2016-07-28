<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plano extends Model
{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];

    //relacionamento de muitos pra muitos
    public function getOpcoes(){
        return $this->belongsToMany('App\Models\OpcoesMenu', 'opcoes_planos', 'id_plano', 'id_opcao');
    }

    //retorna as opções por cada plano passado por parâmetro
    public function getOpcoesPlanos($params){

        return $this->join('opcoes_planos', 'planos.id', '=', 'opcoes_planos.id_plano')
            ->join('opcoes_menus', 'opcoes_planos.id_opcao', '=', 'opcoes_menus.id')
            ->where('planos.id', '=', $params)
            ->select('opcoes_menus.id', 'opcoes_menus.nome', 'opcoes_menus.apelido')
            ->get();
    }
}
