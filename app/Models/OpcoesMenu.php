<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpcoesMenu extends Model
{
    //relacionamento de muitos pra muitos
    public function getOpcoes(){
        return $this->belongsToMany('App\Models\Plano', 'opcoes_planos', 'id_plano', 'id_opcao');
    }

    //retornas todas as opções e mais as opçoes referente ao plano passado como parâmetro
    public function getOpcoesPlanos($params){
        return $this->rightjoin('opcoes_planos', 'opcoes_menus.id', '=', 'opcoes_planos.id_opcao')
            ->where('opcoes_planos.id_plano', '=', $params )
            ->select('opcoes_menus.nome', 'opcoes_menus.apelido')
            ->get();
    }
}
